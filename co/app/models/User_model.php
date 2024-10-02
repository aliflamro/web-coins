<?php

class User_model {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function getAllDataUsers() {
        $this->db->query('SELECT * FROM yuusersco');
        return $this->db->resultSet();
    }
    public function successCoins_out() {
        $this->db->query('SELECT * FROM successCoins');
        return $this->db->resultSet();
    }
    public function coinsPay() {
        $this->db->query('SELECT * FROM coinspay');
        return $this->db->resultSet();
    }
    public function reffsucc_id() {
        $this->db->query('SELECT * FROM reff_succ LIMIT 10');
        return $this->db->resultSet();
    }
    public function coinsPayCounts() {
        $this->db->query('SELECT sum(coins) AS coins FROM coinspay ORDER BY yu_too DESC');
        return $this->db->resultSet();
    }
    public function getUserByUsern($id) {
        $this->db->query('SELECT * FROM yuusersco WHERE usern=:usern');
        $this->db->bind('usern', $id);
        return $this->db->single();
    }
    public function parafReceive($id) {
        $this->db->query('SELECT * FROM successCoins WHERE yu_too=:yu_too ORDER BY id DESC');
        $this->db->bind('yu_too', $id);
        return $this->db->single();
    }
    public function getUserByTokenSucc($id) {
        $this->db->query('SELECT * FROM yuusersco WHERE token=:token');
        $this->db->bind('token', $id);
        return $this->db->single();
    }
    public function succ_reff($id) {
        $this->db->query('SELECT * FROM reff_succ WHERE token_u=:token_u');
        $this->db->bind('token_u', $id);
        return $this->db->single();
    }
    public function succ_reffIs($id) {
        $this->db->query('SELECT sum(coins) AS coins FROM reff_succ WHERE token_i=:token_i');
        $this->db->bind('token_i', $id);
        return $this->db->single();
    }
    public function succ_reffAll($id) {
        $this->db->query('SELECT sum(coins) AS coins FROM reff_succ WHERE coins =:coins');
        $this->db->bind('coins', $id);
        return $this->db->single();
    }
    public function getCoinsByToken($id) {
        $query = "SELECT sum(coins) AS coins FROM coinspay WHERE yu_too = :yu_too";
        $this->db->query($query);
        $this->db->bind('yu_too', $id);
        return $this->db->single();
    }
    public function balancetoo($id) {
        $query = "SELECT sum(cooins) AS cooins FROM successCoins WHERE yu_too = :yu_too";
        $this->db->query($query);
        $this->db->bind('yu_too', $id);
        return $this->db->single();
    }
    public function toooyourCount($id) {
        $query = "SELECT count(yu_too) AS yu_too FROM successCoins WHERE yu_too = :yu_too";
        $this->db->query($query);
        $this->db->bind('yu_too', $id);
        return $this->db->single();
    }
    public function successYuCoinsQuest($data) {
        $query = "SELECT * FROM coinspay WHERE yu_too = :yu_too &&  yu_quest = :yu_quest";
        $this->db->query($query);
        $this->db->bind('yu_quest', $data['yuquests']);
        $this->db->bind('yu_too', $data['yutooos']);
        return $this->db->single();
    }
    public function successYutoo($id) {
        $this->db->query('SELECT * FROM coinspay WHERE yu_too=:yu_too');
        $this->db->bind('yu_too', $id);
        return $this->db->single();
    }
    public function successYuQuest($id) {
        $this->db->query('SELECT * FROM quest WHERE token_answer=:token_answer');
        $this->db->bind('token_answer', $id);
        return $this->db->single();
    }
    public function successYuTasks($id) {
        $this->db->query('SELECT * FROM tasks WHERE token_id=:token_id');
        $this->db->bind('token_id', $id);
        return $this->db->single();
    }
    public function coinsPayByYuQuest($id) {
        $this->db->query('SELECT * FROM coinspay WHERE yu_quest=:yu_quest');
        $this->db->bind('yu_quest', $id);
        return $this->db->single();
    }
    public function deleteNotClaim($token) {
        $query = "DELETE FROM reff_succ WHERE token_u = :token_u";

        $this->db->query($query);
        $this->db->bind('token_u', $token);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function createPayOuts($data)
    {
        $dates = date('H:i, d/m/Y');
        $query = "INSERT INTO successCoins (name,email,number_phone,yu_too,credits,cooins,roles_pay,dates) VALUES (:name,:email,:numberp,:yu_too,:credit,:cooins,:rolesPay,:dates)";
        
        $this->db->query($query);
        $this->db->bind('name', $data['names']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('numberp', $data['numberp']);
        $this->db->bind('yu_too', $data['yu_too']);
        $this->db->bind('credit', $data['credit']);
        $this->db->bind('rolesPay', $data['rolesPay']);
        $this->db->bind('dates', $data['dates']);
        $this->db->bind('cooins', $data['coins']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}