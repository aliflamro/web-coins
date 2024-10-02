<?php


class reff extends Controller {
    public function index() {
        header('Location: '.BASEURL);
    }
    public function referralcode() {
        $refferalslya = htmlspecialchars($_POST['reff']);
        if ($refferalslya) {
            session_start();
            $_SESSION['refferals-codes'] = $refferalslya;
            header('Location: '.BASEURL.'reff/claim/'.$refferalslya);
            exit;
        }

    }
    public function claim($id) {
        $data['getting-i'] = $this->model('Reff_model')->gettingDataByUsern($_SESSION['users_socs_798']);
        $data['getting-u'] = $this->model('Reff_model')->gettingDataByUsern($id);

        //Get Token U
        $data['token_u'] = $data['getting-i']['token'];
        //Get Token I
        $data['token_i'] = $data['getting-u']['token'];
        $data['coins'] = "725";

        $data['reff'] = $this->model('Reff_model')->reff_succData($data);

        $data['reff-ii'] = $this->model('Reff_model')->reff_succData_i($data['token_u']);
        if ($data['getting-i']['usern'] == $id) {
            unset($_SESSION['refferals-codes']);
            Flasher::setFlash(' Not Claim <i class="fa fa-coins"></i> Coins', 'For Codes!', 'danger');
            header('Location: ' . BASEURL.'tasks');
            exit;
        } else if($id){
            session_start();
            $_SESSION['refferals-codes'] = $id;
            header("Location: ".BASEURL.'s/create/200');
            exit;
        }elseif ($data['reff']['token_u'] == $data['token_u'] && $data['reff']['token_i'] == $data['token_i']) {
            unset($_SESSION['refferals-codes']);
            Flasher::setFlash(' Not Claim <i class="fa fa-coins"></i> Coins', 'For Codes!', 'danger');
            header('Location: ' . BASEURL.'tasks');
            exit;
        } else {
            if ($this->model('Reff_model')->uplget_reff($data) > 0) {
                unset($_SESSION['refferals-codes']);
                Flasher::setFlash(' A '.$id.' claim <i class="fa fa-coins"></i> Coins', 'For Reffs!', 'success');
                header('Location: ' . BASEURL.'tasks');
                exit;
            } else {
                session_start();
                $_SESSION['refferals-codes'] = $id;
                header('Location: ' . BASEURL.'s/create/200');
            }
        }
    }
}