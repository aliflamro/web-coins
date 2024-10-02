<?php

class login extends Controller {
    public function index() {
        header('Location: '.BASEURL.'co/');
    }
    public function logout() {
        session_start();
        session_destroy();
        header("Location: ".BASEURL);
    }
    public function prosessLogin() {
        $ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => '6LeAutgpAAAAAKjP-ximhzXwTjr7uD1DaH7sNB5c',
            'response' => $_POST['g-recaptcha-response'],
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response);

        $postPassw = $_POST['passw'];
        /*if ($result->success) { */
            if ($postPassw == "2ac114883379ca8ffcd3551f1a6fabe4") {
                session_start();
                $_SESSION['dashboard-sessions'] = substr($data['log']['token'], 0, 8)."-".substr($data['log']['token'], 8, 8)."-".substr($data['log']['token'], 16, 8)."-".substr($data['log']['token'], 24, 8);
                header('Location: '.BASEURL.'dashboard/create.php');
                exit;
            } else {
                session_start();
                $_SESSION['d-sessions'] = "Failed Login!";
                header('Location: '.BASEURL.'dashboard/access');
                exit;
            }
        /*} else {
            Flasher::setFlash(' No ', ' Register!!', 'warning');
            header('Location: '.BASEURL.'s');
            exit;
        }*/

    }

}