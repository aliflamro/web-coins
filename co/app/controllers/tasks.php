<?php

class tasks extends Controller {
    public function index()
    {
        error_reporting(0);
        Flasher::sessions();
        $data['tasks_78'] = $this->model('Tasks_model')->gettingDataTasks();
        $data['users'] = $this->model('User_model')->getAllDataUsers();
        $data['count'] = count($data['users']);
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);
    }
    public function questions($id)
    {
        error_reporting(0);
        Flasher::sessions();
        $data['token_id'] = base64_decode($id);
        $data['questions-him'] = $this->model('Tasks_model')->gettingDataQuestions($data['token_id']);
        $this->view('templates/header', $data);
        $this->view('home/questions', $data);
        $this->view('templates/footer', $data);
    }
}