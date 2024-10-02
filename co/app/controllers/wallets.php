<?php

class wallets extends Controller {
    public function index() {
        Flasher::sessions();
        $data['getting'] = $this->model('User_model')->getUserByUsern($_SESSION['users_socs_798']);

        $data['start'] = $this->model('User_model')->getCoinsByToken($data['getting']['token']);

        $data['history'] = $this->model('User_model')->coinsPay();
        $data['refferally'] = $this->model('User_model')->reffsucc_id();
        $data['balance-too'] = $this->model('User_model')->balancetoo($data['getting']['token']);

        $taken = $data['getting']['token'];
        $data['getting-i'] = $this->model('User_model')->succ_reffIs($taken);
        $cooins_reff += $data['getting-i']['coins'];
        $cooinsOut = $data['balance-too']['cooins'];

        $cooins = $data['start']['coins'] + $cooins_reff - $cooinsOut;
        $idr = $cooins * 0.00000001;
        $dollar = $idr * 5000.00;
        $data['idr_330'] = rupiah_id($dollar);
        $data['yc_20'] = $idr;
        $data['ycs_77'] = $cooins;
        $this->view('templates/header', $data);
        $this->view('w/wallet', $data);
        $this->view('templates/footer', $data);
    }
    public function pay() {
        Flasher::sessions();
        $data['users-co'] = $this->model('User_model')->getUserByUsern($_SESSION['users_socs_798']);

        $taken_u = $data['users-co']['token'];

        $data['users-mail'] = $this->model('User_model')->parafReceive($taken_u);

        $data['users-count'] = $this->model('User_model')->toooyourCount($taken_u);

        $data['balances-too'] = $this->model('User_model')->balancetoo($taken_u);

        $data['successcoins'] = $this->model('User_model')->successCoins_out();
        $data['coins-too'] = $this->model('User_model')->getCoinsByToken($taken_u);
        $data['succ-too'] = $this->model('User_model')->succ_reffIs($taken_u);
        $this->view('templates/header', $data);
        $this->view('w/payAccount', $data);
        $this->view('templates/footer', $data);
    }
    public function payOuts() {
        Flasher::sessions();
        $data['users-co'] = $this->model('User_model')->getUserByUsern($_SESSION['users_socs_798']);
        $token_users = $data['users-co']['token'];

        $data['coins-too'] = $this->model('User_model')->getCoinsByToken($token_users);
        $data['succ-too'] = $this->model('User_model')->succ_reffIs($token_users);
        $data['balance-too'] = $this->model('User_model')->balancetoo($token_users);

        $rps = "IDR10000";
        $balance = $rps;
        $referrals += $data['succ-too']['coins'];
        $coinstasks += $data['coins-too']['coins'];

        $coinsOut += $data['balance-too']['cooins'];

        $cooooins = $referrals + $coinstasks - $coinsOut;
        $idrs = $cooooins * 0.00000001;
        $dollar = $idrs * 5000.00;
        $total = rupiah_id($dollar);
        $data['names'] = htmlspecialchars(strip_tags($_POST['names']));
        $data['email'] = base64_encode(htmlspecialchars(strip_tags($_POST['email'])));
        $data['numberp'] = base64_encode(htmlspecialchars(strip_tags($_POST['numb_phone'])));
        $data['yu_too'] = $token_users;
        $data['credit'] = $balance;
        $data['coins'] = "200000000";
        $data['rolesPay'] = base64_encode("Pending");
        $data['dates'] = date('H:i, d/m/Y');
        $ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => 'TOKEN-KEY',
            'response' => $_POST['g-recaptcha-response'],
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response);
        if ($result->success) {
            if ($cooooins > "200000000") {
                if ($this->model('User_model')->createPayOuts($data) > 0) {
                    $_SESSION['credit-not-out'] = "<div class='alert alert-success'><b>Withdrawal</b>  requests will be processed immediately in less than <b>three days </b> of . <b>checking</b></div>";
                    header('Location: ' . BASEURL.'wallets/pay');
                    exit;
                } else {
                    $_SESSION['credit-not-out'] = "<div class='alert alert-danger'><b>Error</b> Not <b>Found!</b></div>";
                    header('Location: ' . BASEURL.'wallets/pay');
                    exit;
                }
            } else {
                $_SESSION['credit-not-out'] = "<div class='alert alert-danger'><b>IDR</b> threshold is less than <b>market price!</b></div>";
                header('Location: ' . BASEURL.'wallets/pay');
                exit;

            }
        } else {
            $_SESSION['credit-not-out'] = "<div class='alert alert-danger'><b>Not Success!</b></div>";
            header('Location: ' . BASEURL.'wallets/pay');
            exit;
        }
    }
    public function resend() {
        Flasher::sessions();
        $data['users-co'] = $this->model('User_model')->getUserByUsern($_SESSION['users_socs_798']);
        $token_users = $data['users-co']['token'];
        $data['coins-too'] = $this->model('User_model')->getCoinsByToken($token_users);
        $data['succ-too'] = $this->model('User_model')->succ_reffIs($token_users);
        $data['balance-too'] = $this->model('User_model')->balancetoo($token_users);


        $data['send-too'] = $this->model('User_model')->parafReceive($token_users);


        $rps = "IDR10000";
        $balance = $rps;
        $referrals += $data['succ-too']['coins'];
        $coinstasks += $data['coins-too']['coins'];

        $coinsOut += $data['balance-too']['cooins'];

        $cooooins = $referrals + $coinstasks - $coinsOut;
        $idrs = $cooooins * 0.00000001;
        $dollar = $idrs * 5000.00;
        $total = rupiah_id($dollar);

        $data['names'] = $data['send-too']['name'];
        $data['email'] = $data['send-too']['email'];
        $data['numberp'] = $data['send-too']['email'];
        $data['yu_too'] = $token_users;
        $data['credit'] = $balance;
        $data['coins'] = "200000000";
        $data['rolesPay'] = base64_encode("Pending");
        $data['dates'] = date('H:i, d/m/Y');
        if ($cooooins > "200000000") {
            if ($this->model('User_model')->createPayOuts($data) > 0) {
                $_SESSION['credit-not-out'] = "<div class='alert alert-success'><b>Withdrawal</b>  requests will be processed immediately in less than <b>three days </b> of . <b>checking</b></div>";
                header('Location: ' . BASEURL.'wallets/pay');
                exit;
            } else {
                $_SESSION['credit-not-out'] = "<div class='alert alert-danger'><b>Error</b> Not <b>Found!</b></div>";
                header('Location: ' . BASEURL.'wallets/pay');
                exit;
            }
        } else {
            $_SESSION['credit-not-out'] = "<div class='alert alert-danger'><b>IDR</b> threshold is less than <b>market price!</b></div>";
            header('Location: ' . BASEURL.'wallets/pay');
            exit;

        }
    }
}
