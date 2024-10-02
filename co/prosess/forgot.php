<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
define('BASEURL', 'http://localhost:8000/yunme.biz.id/co/');
define('DB_HOST', 'sql207.hstn.me');
define('DB_USER', 'mseet_33435779');
define('DB_PASS', 'Aimerdeka12');
define('DB_NAME', 'mseet_33435779_yunmezymz_real');
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'secret' => '6LeAutgpAAAAAKjP-ximhzXwTjr7uD1DaH7sNB5c',
    'response' => $_POST['g-recaptcha-response'],
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$result = json_decode($response);

date_default_timezone_set("Asia/Jakarta");
$email = htmlspecialchars($_POST['email']);
$token = md5($email.date('Y-m-d'));
$dates = date("H:i, d-m-Y");
$mail = new PHPMailer(true);
$sql = "SELECT * FROM yuusersco WHERE email = '$email'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
$yunmecoinsForgot = substr(md5($email), 0, 8);
$yunmecoinsForgotDua = substr(md5($email), 8, 8);
$randomToken = substr(md5(date("H:i d-m-y")), 0, 8);
$randomTokenDua = substr(md5(date("H:i:s d-m-y")), 8, 8);

$token = $randomToken."-".$yunmecoinsForgot."-".$randomTokenDua."-".$yunmecoinsForgotDua;

$tokenid_here = $row['token']."_".$row['usern'];

$sqls = "SELECT * FROM success_id WHERE token_sce = '$tokenid_here'";

$queriie = mysqli_query($con, $sqls);

$rowty = mysqli_fetch_array($queriie);
$verify = md5('banned');
if ($result->success) {
    if ($row['verify'] == $verify && $row['token'] || $tokenid_here == $rowty['token_sce']) {
        session_start();
        $_SESSION['forgotes'] = "<div class='alert alert-danger'>Request no Success!</div>";
        header('Location: '.BASEURL.'s/forgot');
        exit;
    } else {
        if ($query) {
            $mail->isSMTP();

            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'example@gmail.com';
            $mail->Password = '*******';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            //Recipients
            $mail->setFrom('yunmefreecoins@gmail.com', 'no-reply');
            $mail->addAddress($email, $row['nama']);
            $mail->addReplyTo('bussinescodeshelping@gmail.com', 'Yunme Email');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password - Yunmecoins';
            $mail->Body = "Hi, ".$row['usern']."<br>Reset for Password by Site before access  : ".BASEURL."s/neew/".base64_encode($row['usern'])."=-=".base64_encode($token)."=-=".base64_encode($email);

            // Success sent message alert
            $mail->send();

            session_start();


            //send the message, check for errors
            if (!$mail->send()) {
                echo 'Mailer Error: '. $mail->ErrorInfo;
            } else {
                session_start();
                $_SESSION['yunmecoins'] = $token;
                Flasher::setFlash(' | Reset Password.', 'Check your email!', 'success');
                header('Location: ' . BASEURL.'s');
                exit;
            }
        } else {
            Flasher::setFlash('No Found.', 'Back!', 'danger');
            header('Location: ' . BASEURL.'s/forgot');
            exit;
        }
    }
} else {
    session_start();
    $_SESSION['forgotes'] = "<div class='alert alert-danger'>Request no Success!</div>";
    header('Location: '.BASEURL.'s/forgot');
    exit;
}
?>
