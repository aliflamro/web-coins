<?php

class Register_model {
    private $table = 'yuusersco';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    public function confirm($data) {
            $codesa = md5(htmlspecialchars($data['codes'])."-".date("hidmy"));
            $coa = substr($codesa,0,8)."-".substr($codesa,16,8);
            $codeToken = md5(htmlspecialchars($data['codes']));
            $verif = htmlspecialchars($data['codep']);
            $query = "UPDATE yuusersco SET
                    token = :token,
                    verify = :codes
                  WHERE verify = :verify";
            $this->db->query($query);
            $this->db->bind('token', $codeToken);
            $this->db->bind('verify', $verif);
            $this->db->bind('codes', $coa);
            $this->db->execute();

            return $this->db->rowCount();
    }
    public function getUsersByEmail($data) {
        $userna = htmlspecialchars($data['usern']);
        $passwee = md5($data['passw']);
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE usern=:usern && passw=:passw');
        $this->db->bind('usern', $userna);
        $this->db->bind('passw', htmlspecialchars($passwee));
        return $this->db->single();
    }
    public function gettingEmail($data) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email && usern=:usern');
        $this->db->bind('email', $data['email']);
        $this->db->bind('usern', $data['usern']);
        return $this->db->single();
    }
    public function getUsersByTokenes($data) {
        $this->db->query('SELECT * FROM success_id WHERE token_sce=:token_sce');
        $this->db->bind('token_sce', $data['been']);
        return $this->db->single();
    }
    public function newSandi($data) {
        $email = htmlspecialchars($data['email']);
        $usern = htmlspecialchars($data['usern']);
        $repassw = htmlspecialchars($data['repassw']);

        $query = "UPDATE yuusersco SET
                    passw = :repassw
                  WHERE email = :email && usern=:usern";
        $this->db->query($query);
        $this->db->bind('usern', $usern);
        $this->db->bind('email', $email);
        $this->db->bind('repassw', $repassw);
        $this->db->execute();
        return $this->db->rowCount();
    }

}