<?php

class p extends Controller {
    public function index() {
        $ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => 'TOKEN-KEY',
            'response' => $_POST['g-recaptcha-response'],
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response);
        $ban = md5('banned');
        /* if ($result->success) { */
            if ($_POST['codep'] == $ban) {
                header('Location: '.BASEURL.'s');
            } else {
                if ($this->model('Register_model')->confirm($_POST) > 0) {
                    Flasher::setFlash('Verifications ', 'Successfully', 'success');
                    header('Location: ' . BASEURL);
                    exit;
                } else {
                    Flasher::setFlash('Not Success', 'Verifications!', 'danger');
                    header('Location: ' . BASEURL);
                    exit;
                }
            }
       /* } else {
            Flasher::setFlash('Not Success', 'Verifications!', 'danger');
            header('Location: ' . BASEURL);
            exit;
        }*/
    }
    public function loadpages($id) {
        $bases = base64_decode($id);
        header('Location: '.$bases);
    }
    public function logout() {
        session_start();
        session_destroy();
        header("Location: ".BASEURL);
    }
    public function tasks_completes($id) {
        $expscs = explode("-", $_SESSION['answers-tokens']);
        $tokenkey = $expscs[0]."".$expscs[1]."".$expscs[2]."".$expscs[3];
        $data['posts'] = $this->model('Tasks_model')->guestQuestByTokens($tokenkey);

        $expscc = explode("-", $_SESSION['tokens_id']);
        $data['yu_too'] = $expscc[0]."".$expscc[1]."".$expscc[2]."".$expscc[3];

        $data['yuto'] = $expscc[0]."".$expscc[1]."".$expscc[2]."".$expscc[3];

        $data['yu_quest'] = $tokenkey;
        $tasksed = $data['posts']['roles'];
        $expla = explode("_", $tasksed);

        $data['yu_tasks'] = $expla[1];

        $data['posts-tos'] = $this->model('Tasks_model')->coinspayByYuQuest($data);

        $ans = base64_decode($_SESSION['likes']);

        if ($data['yu_quest'] == $data['posts-tos']['yu_quest']) {
            unset($_SESSION['yesnow']);
            unset($_SESSION['answers']);
            unset($_SESSION['answers-tokens']);
            unset($_SESSION['tokens_id']);
            unset($_SESSION['likes']);
            Flasher::setFlash('Has Claim <i class="fa fa-coins"></i> Coins', 'Tasks Successfully!', 'success');
            header('Location: ' . BASEURL.'tasks');
            exit;
        } else {
            if ($_SESSION['yesnow'] == "yes") {
                if ($_SESSION['answers'] == $ans) {
                    if ($this->model('Tasks_model')->tambahAnswers($data) > 0) {
                        Flasher::setFlash('Has Claim <i class="fa fa-coins"></i> Coins', 'Tasks Successfully!', 'success');

                        header('Location: ' . BASEURL.'tasks');
                        unset($_SESSION['yesnow']);
                        unset($_SESSION['answers']);
                        unset($_SESSION['answers-tokens']);
                        unset($_SESSION['tokens_id']);
                        unset($_SESSION['likes']);
                        exit;

                    } else {
                        Flasher::setSuccess('Question Not Success ', 'for Tasks!', 'danger');
                        unset($_SESSION['yesnow']);
                        unset($_SESSION['answers']);
                        unset($_SESSION['answers-tokens']);
                        unset($_SESSION['tokens_id']);
                        unset($_SESSION['likes']);
                        header('Location: ' . BASEURL.'q/tasksto/'.$id);
                        exit;
                    }
                } else {
                    unset($_SESSION['yesnow']);
                    unset($_SESSION['answers']);
                    unset($_SESSION['answers-tokens']);
                    unset($_SESSION['tokens_id']);
                    unset($_SESSION['likes']);
                    Flasher::setSuccess('Not Success ', 'Reload for Question!', 'danger');
                    header('Location: ' . BASEURL.'q/tasksto/'.$id);
                    exit;
                }
            } else {
                unset($_SESSION['yesnow']);
                unset($_SESSION['answers']);
                unset($_SESSION['answers-tokens']);
                unset($_SESSION['tokens_id']);
                unset($_SESSION['likes']);
                Flasher::setSuccess('Not Success ,', ' Reload for Question!', 'danger');
                header('Location: ' . BASEURL.'q/tasksto/'.$id);
                exit;
            }

        }

    }

    public function prosessLogin() {
        $ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => 'TOKEN-KEY',
            'response' => $_POST['g-recaptcha-response'],
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response);

        $data['getting'] = $_POST;
        $data['stuces'] = $this->model('Register_model')->getUsersByEmail($_POST);
        $data['been'] = $data['stuces']['token']."_".$data['stuces']['usern'];
        $succid = $data['been'];
        $data['succ_id'] = $this->model('Register_model')->getUsersByTokenes($data);

        $data['soc_509'] = substr($data['stuces']['passw'], 0, 9);
        $data['nas_009'] = $data['stuces']['verify']."-".$data['soc_509'];
        $data['soc_base'] = substr(md5($data['stuces']['usern']), 0, 6)."-".$data['nas_009'];

        $gettingPassword = md5($data['getting']['passw']);
        $veifications = md5('banned');
        /*if ($result->success) {*/
            if ($succid == $data['succ_id']['token_id'] || $data['stuces']['verify'] == $veifications) {
                Flasher::setFlash(' Has Been Banned Permanently ', ' We for Sorry!', 'warning');
                header('Location: '.BASEURL.'s');
                exit;
            } else {
                if (strlen($data['nas_009']) > 24 && $data['soc_base'] == $data['soc_base']) {
                    Flasher::setFlash('Login ', 'Successfully', 'success');
                    $_SESSION['users_socs'] = $data['nas_009'];
                    $_SESSION['users_socs_798'] = $data['stuces']['usern'];
                    $data['admin'] = $data['stuces']['usern'];
                    if ($data['admin'] == "Yunmecaven") {
                        $_SESSION['admin_tokens'] = $_SESSION['users_socs'];
                    }
                    header('Location: ' . BASEURL.'tasks');
                    exit;
                } else if ($data['stuces']['usern'] == $data['getting']['usern'] && $data['stuces']['passw'] == $gettingPassword) {
                    if (strlen($data['nas_009']) < 20) {
                        Flasher::setFlash('for Verifications', ' | Check Your Email!', 'danger');
                        header('Location: ' . BASEURL.'s/confirm');
                        exit;
                    } else {
                        Flasher::setFlash('Not Success', 'Log In!', 'danger');
                        header('Location: ' . BASEURL);
                        exit;
                    }
                } else {
                    Flasher::setFlash('Not Success', 'Log In!', 'danger');
                    header('Location: ' . BASEURL);
                    exit;
                }
            }
        /*} else {
            Flasher::setFlash(' No ', ' Register!!', 'warning');
            header('Location: '.BASEURL.'s');
            exit;
        }*/

    }

}
