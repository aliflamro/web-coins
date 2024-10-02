<?php


class Tasks_model {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function gettingDataTasks() {
        $this->db->query('SELECT * FROM tasks');
        return $this->db->resultSet();
    }
    public function gettingQuestionsID() {
        $this->db->query('SELECT * FROM quest');
        return $this->db->resultSet();
    }
    public function gettingTokenTasks($id) {
        $this->db->query('SELECT * FROM tasks WHERE token_id=:token_id');
        $this->db->bind('token_id', $id);
        return $this->db->single();
    }
    public function gettingTokenQuestionsOpi($id) {
        $this->db->query('SELECT * FROM quest WHERE token_answer=:token_answer');
        $this->db->bind('token_answer', $id);
        return $this->db->single();
    }
    public function getQuestByLimit($data) {
        $this->db->query('SELECT * FROM quest WHERE roles = :roles');
        $this->db->bind('roles', $data['roles']);
        return $this->db->single();
    }
    public function gettingDataQuestions($key) {
        $query = "SELECT * FROM quest WHERE roles LIKE :keyword ORDER BY id_quest ASC";
        $this->db->query($query);
        $this->db->bind('keyword', "%$key%");
        return $this->db->resultSet();
    }
    public function guestQuestByTokens($id) {

        $this->db->query('SELECT * FROM quest WHERE token_answer =:token_answer');
        $this->db->bind('token_answer', $id);
        return $this->db->single();
    }
    public function guestID($id) {

        $this->db->query('SELECT * FROM quest WHERE token_answer =:token_answer');
        $this->db->bind('token_answer', $id);
        return $this->db->single();
    }
    public function coinspayByYuQuest($data) {
        $this->db->query('SELECT * FROM coinspay WHERE yu_too =:yu_too');
        $this->db->bind('yu_too', $data['yuto']);
        
        return $this->db->single();
    }
    public function coinsByYuQuestions($data) {
        $this->db->query('SELECT * FROM coinspay WHERE yu_too =:yu_too && yu_quest = :yu_quest');
        $this->db->bind('yu_too', $data['yuto']);
        $this->db->bind('yu_quest', $data['yuqu']);
        
        return $this->db->single();
    }
    public function tambahAnswers($data) {
        $dates = date('H:i, d-M-Y');
        $coines = $data['posts']['coins_per_quest'] + "2";
        $query = "INSERT INTO coinspay (coins,yu_too,yu_quest,yu_tasks,dates)
                    VALUES
                  (:coins, :yu_too, :yu_quest,:yu_tasks,:dates)";
        $this->db->query($query);
        $this->db->bind('coins', $coines);
        $this->db->bind('yu_too', $data['yu_too']);
        $this->db->bind('yu_quest', $data['yu_quest']);
        $this->db->bind('yu_tasks', $data['yu_tasks']);
        $this->db->bind('dates', $dates);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function randomAnswers($key) {
        $this->db->query('SELECT * FROM answer_link WHERE tokenscn =:tokenscn ORDER BY RAND() LIMIT 1');
        $this->db->bind('tokenscn', $key);
        
        return $this->db->single();
    }
}