<?php
class Apis_model {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function createTasks($data) {
        $roles = "10";
        $token = md5(date("H:i dmY"));
        $query = "INSERT INTO tasks (tasks_to,title,title_site,times,coins,count_quest,url,roles,token_id) VALUES
                  (:tasks_to, :title, :title_site, :times, :coins, :count_quest, :url, :roles, :token_id)";

        $this->db->query($query);
        $this->db->bind('tasks_to', $data['tasks_to']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('title_site', $data['title_site']);
        $this->db->bind('times', $data['times']);
        $this->db->bind('coins', $data['coins']);
        $this->db->bind('count_quest', $data['count_quest']);
        $this->db->bind('url', $data['url']);
        $this->db->bind('roles', $roles);
        $this->db->bind('token_id', $token);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function createAnswers($data) {
        $roles = "10";
        $answers = base64_encode(htmlspecialchars($data['answers']));
        $link = base64_encode(htmlspecialchars($data['link']));
        $query = "INSERT INTO answer_link (answersscv,linkscc,tokenscn) VALUES
                  (:answers, :link, :token)";

        $this->db->query($query);
        $this->db->bind('answers', $answers);
        $this->db->bind('link', $link);
        $this->db->bind('token', $data['token']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function createQuest($data) {
        $coinsTotal = "";
        $dates = date("G:i d/m/Y");
        $token = md5(date("H:i dmY"));
        $query = "INSERT INTO quest (clue,coins_total,count_quest_to,quest_title,link,answer,token_answer,tasks,coins_per_quest,roles,dates) VALUES
                  (:clue,:coins_total,:count_quest_to,:quest_title,:link,:answer,:token_answer,:tasks,:coins_per_quest,:roles,:dates)";

        $this->db->query($query);
        $this->db->bind('roles', $data['roles']);
        $this->db->bind('quest_title', $data['quest_title']);
        $this->db->bind('clue', $data['clue']);
        $this->db->bind('tasks', $data['tasks']);
        $this->db->bind('coins_per_quest', $data['coins_per_quest']);
        $this->db->bind('count_quest_to', $data['count_quest_to']);
        $this->db->bind('link', $data['url']);
        $this->db->bind('answer', $data['answer']);


        $this->db->bind('token_answer', $token);
        $this->db->bind('dates', $dates);
        $this->db->bind('coins_total', $coinsTotal);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function gettAllData() {
        $this->db->query('SELECT * FROM tasks');
        return $this->db->resultSet();
    }
    public function getAllDataPayOut() {
        $this->db->query('SELECT * FROM successCoins');
        return $this->db->resultSet();
    }
    public function getdataSimples($key) {

        $keyword = $key;
        $query = "SELECT * FROM answer_link WHERE tokenscn LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$key%");
        return $this->db->resultSet();
    }

    public function getDataQuest($key) {

        $query = "SELECT * FROM quest WHERE roles LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$key%");
        return $this->db->resultSet();
    }
    public function getCoinsByTokens($key) {
        $query = "SELECT * FROM coinspay WHERE yu_too LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$key%");
        return $this->db->resultSet();
    }

    public function editDataTasks($data) {
        $query = "UPDATE tasks SET
                    tasks_to = :tasks_to,
                    title = :title,
                    title_site = :title_site,
                    times = :times,
                    coins = :coins,
                    count_quest = :count_quest,
                    url = :url,
                    roles = :roles
                  WHERE id_tasks = :id_tasks";

        $this->db->query($query);
        $this->db->bind('tasks_to', $data['tasks_to']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('title_site', $data['title_site']);
        $this->db->bind('times', $data['times']);
        $this->db->bind('coins', $data['coins']);
        $this->db->bind('count_quest', $data['count_quest']);
        $this->db->bind('url', $data['url']);
        $this->db->bind('roles', $data['roles']);

        $this->db->bind('id_tasks', $data['id_tasks']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function editRolesQuest($data) {
        $query = "UPDATE quest SET
                    roles = :token_id
                  WHERE roles = :roles";

        $this->db->query($query);
        $this->db->bind('token_id', $data['token_id']);
        $this->db->bind('roles', $data['roles']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function editDataQuestions($data) {
        $query = "UPDATE quest SET
                    clue = :clue,
                    count_quest_to = :count_quest_to,
                    quest_title = :quest_title,
                   link = :link,
                  answer = :answer,
                    tasks = :tasks,
                   coins_per_quest = :coins_per_quest,
                  roles = :roles
                  WHERE id_quest = :id_quest";

        $this->db->query($query);
        $this->db->bind('roles', $data['roles']);
        $this->db->bind('quest_title', $data['quest_title']);
        $this->db->bind('clue', $data['clue']);
        $this->db->bind('tasks', $data['tasks']);
        $this->db->bind('coins_per_quest', $data['coins_per_quest']);
        $this->db->bind('count_quest_to', $data['count_quest_to']);
        $this->db->bind('link', $data['link']);
        $this->db->bind('answer', $data['answer']);

        $this->db->bind('id_quest', $data['id_quest']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getDataTasks_id($id) {
        $this->db->query('SELECT * FROM tasks WHERE id_tasks = :id_tasks');
        $this->db->bind('id_tasks', $id);
        return $this->db->single();
    }
    public function getQuestByIdOp($id) {
        $this->db->query('SELECT * FROM quest WHERE id_quest = :id_quest');
        $this->db->bind('id_quest', $id);
        return $this->db->single();
    }
    public function hapusDataTasks($id) {
        $query = "DELETE FROM tasks WHERE id_tasks = :id_tasks";

        $this->db->query($query);
        $this->db->bind('id_tasks', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDataQuest($id) {
        $query = "DELETE FROM quest WHERE roles = :roles";

        $this->db->query($query);
        $this->db->bind('roles', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDataQuestions($id) {
        $query = "DELETE FROM quest WHERE id_quest = :id_quest";

        $this->db->query($query);
        $this->db->bind('id_quest', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDataAnswers($id) {
        $query = "DELETE FROM answer_link WHERE idsov = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDataCoinsID($id) {
        $query = "DELETE FROM coinspay WHERE yu_too = :yu_too";

        $this->db->query($query);
        $this->db->bind('yu_too', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDataRefferal($id) {
        $query = "DELETE FROM reff_succ WHERE token_i = :token_i";

        $this->db->query($query);
        $this->db->bind('token_i', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getAllDataUsersY() {
        $this->db->query('SELECT * FROM yuusersco');
        return $this->db->resultSet();
    }
    public function getAllDataOnBan() {
        $this->db->query('SELECT * FROM success_id');
        return $this->db->resultSet();
    }
    public function bannedUsers($id) {
        $verify = md5("banned");
        $query = "UPDATE yuusersco SET
                  verify = :verify
                  WHERE id_users = :id_users";

        $this->db->query($query);
        $this->db->bind('verify', $verify);
        $this->db->bind('id_users', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function gettingUsersById($id) {
        $this->db->query('SELECT * FROM yuusersco WHERE id_users=:id_users');
        $this->db->bind('id_users', $id);
        return $this->db->single();
    }
    public function succBand($data) {
        $status = "Non Actives";
        $dates = date('H:i, d-m-Y');
        $token = md5(date("H:i dmY"));
        $query = "INSERT INTO success_id (token_sce,statussce,tokensce,dateat) VALUES
                  (:token_id, :status, :token, :dates)";

        $this->db->query($query);
        $this->db->bind('token_id', $data['token_id']);
        $this->db->bind('status', $status);
        $this->db->bind('token', $token);
        $this->db->bind('dates', $dates);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function searchUsers($key) {
        $keyword = $key;
        $query = "SELECT * FROM yuusersco WHERE usern LIKE :keyword OR token LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$key%");
        return $this->db->resultSet();
    }
    public function searchBanned($key) {
        $keyword = $key;
        $query = "SELECT * FROM success_id WHERE token_sce LIKE :keyword OR tokensce LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$key%");
        return $this->db->resultSet();
    }
    public function updatesSuccessCoins($token) {
        $rolespay = base64_encode("Successfully");
        $query = "UPDATE successCoins SET
                    roles_pay = :roles_pay
                  WHERE yu_too = :yu_too";

        $this->db->query($query);
        $this->db->bind('yu_too', $token);
        $this->db->bind('roles_pay', $rolespay);

        $this->db->execute();

        return $this->db->rowCount();
    }
}