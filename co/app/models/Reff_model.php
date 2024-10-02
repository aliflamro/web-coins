<?php
class Reff_model {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function gettingDataByUsern($id) {
        $this->db->query('SELECT * FROM yuusersco WHERE usern=:usern');
        $this->db->bind('usern', $id);
        return $this->db->single();
    }
    public function reff_succData($data) {
        $this->db->query('SELECT * FROM reff_succ WHERE token_i=:token_i && token_u =:token_u');
        $this->db->bind('token_i', $data['token_i']);
        $this->db->bind('token_u', $data['token_u']);
        return $this->db->single();
    }
    public function reff_succData_i($id) {
        $this->db->query('SELECT * FROM reff_succ WHERE token_i=:token_i');
        $this->db->bind('token_i', $id);
        return $this->db->single();
    }
    public function reff_succData_iu($data) {
        $this->db->query('SELECT * FROM reff_succ WHERE token_i=:token_i && token_u=:token_u');
        $this->db->bind('token_i', $data['token_iiii']);
        $this->db->bind('token_u', $data['token_uuuu']);
        return $this->db->single();
    }
    public function uplget_reff($data) {
        $token_c = md5(rand(0,99999)."".date("H:i dmY"));
        $dates = date("H:i, d-m-Y");
        $query = "INSERT INTO reff_succ (coins,token_i,token_u,token_c,dates) VALUES
                  (:coins,:token_i,:token, :token_c,:dates)";

        $this->db->query($query);
        $this->db->bind('coins', $data['coins']);
        $this->db->bind('token_i', $data['token_i']);
        $this->db->bind('token', $data['token_u']);
        $this->db->bind('token_c', $token_c);
        $this->db->bind('dates', $dates);
        $this->db->execute();
        return $this->db->rowCount();
    }
}