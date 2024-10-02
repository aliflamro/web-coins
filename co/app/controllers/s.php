<?php

class s extends Controller {
    public function index() {
        $this->view('s/Login', $data);
    }
    public function create($id) {
        $data['actives'] = $id;
        $this->view('s/Signup', $data);
    }
    public function forgot() {
        $this->view('s/Forgot', $data);
    }
    public function confirm() {
        Flasher::sesscom();
        $this->view('s/confirm', $data);
    }
    public function neew($id) {
        if($id){
            $exp = explode("=-=", $id);
            $data['token'] = base64_decode($exp[1]);
            $_SESSION['yunmecoins'] = $data['token'];
            $_SESSION['sstrt'] = $_SESSION['usersas'];
            header("Location: ".BASEURL."s/newPassword/".$id."=-=".$_SESSION['email-session']);
        }
    }
    public function newPassword($id) {
        $data['id_siid'] = $id;
        $exp = explode("=-=", $id);
        $data['email'] = base64_decode($exp[2]);
        $data['usern'] = base64_decode($exp[0]);
        $data['token'] = base64_decode($exp[1]);
        $data['getting'] = $this->model('Register_model')->gettingEmail($data);
        $excs = explode('@', $data['email']);
        $excs7 = explode('@', $data['getting']['email']);
        
        $escs = explode("-", $data['token']);
        $tokenSatu = $escs[0];
        $tokenDua = $escs[1];
        $tokenTiga = $escs[2];
        $tokenEmpat = $escs[3];

        $sessions = $_SESSION['yunmecoins'];
        $escsy = explode("-", $sessions);
        $tokenSatuD = $escsy[0];
        $tokenSatuM = $escsy[1];
        $tokenSatuY = $escsy[2];
        $tokenSatuH = $escsy[3];

        if ($data['token'] == $sessions && $tokenSatu == $tokenSatuD && $tokenSatuM == $tokenDua && $tokenSatuH == $tokenEmpat) {
            if ($excs == $excs7) {
                $data['soc_1'] = substr(md5($data['email']), 0, 6);
                $data['soc_27'] = substr(md5($data['getting']['email']), 0, 6);

                $data['soc_17'] = substr(md5($data['usern']), 0, 6);
                $data['soc_37'] = substr(md5($data['getting']['usern']), 0, 6);
                $data['arr'] = $data['soc_1']."-".$data['soc_17']."-".$data['soc_37']."-".$data['soc_27'];
                $ran = md5(rand(0, 9999));
                if ($data['arr'] && $data['email'] == $data['getting']['email'] && $data['usern'] == $data['getting']['usern'] && $ran) {
                    $this->view('s/New', $data);
                } else {
                    header("Location: ".BASEURL);
                }
            } else {
                header("Location: ".BASEURL);
            }
        } else {
            header("Location: ".BASEURL);
        }
    }
}