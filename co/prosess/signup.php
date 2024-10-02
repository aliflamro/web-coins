<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
define('BASEURL', 'http://localhost:8000/yunme.biz.id/co/');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'dbalona');
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'secret' => 'TOKEN-KEY',
    'response' => $_POST['g-recaptcha-response'],
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$result = json_decode($response);


date_default_timezone_set("Asia/Jakarta");
$nama = '';
$usern = htmlspecialchars($_POST['usern']);
$email = htmlspecialchars($_POST['email']);
$passw = htmlspecialchars($_POST['passw']);
$passwHash = md5(htmlspecialchars($passw));
$verify = rand(0, 999999);
$token = md5($email."s".date('H:i')."w".date('H:i, Y-m-d'));
$dates = date("H:i, d-m-Y");



$mail = new PHPMailer(true);


$sqltt = "SELECT * FROM yuusersco where email='$email'";
$sss = mysqli_query($con, $sqltt);
$row = mysqli_fetch_array($sss);

$sqltat = "SELECT * FROM yuusersco where usern='$usern'";
$sssusers = mysqli_query($con, $sqltat);
$rows = mysqli_fetch_array($sss);

/*if ($result->success) {*/
    if ($email == $row['email'] || $usern == $rows['usern'] || empty($email) || empty($usern) || empty($passw)) {
        session_start();
        $data = "100";
        $_SESSION['sesssions'] = "<div class='alert alert-danger'>Sign Up in Yunmecoins your not successfully</div>";
        header('Location: ' . BASEURL.'s/create/'.$data);
        exit;
    } else {
        $sql = "INSERT INTO yuusersco (nama,usern,email,passw,verify,token,dates) VALUES ('$nama','$usern','$email','$passwHash','$verify','$token','$dates')";
        $query = mysqli_query($con, $sql);
        //Server settings

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'example@gmail.com';
        $mail->Password = '******';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('yunmefreecoins@gmail.com', 'no-reply');
        $mail->addAddress($email, $nama);
        $mail->addReplyTo('bussinescodeshelping@gmail.com', 'Yunme Email');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Verification Account - Yunmecoins';
        $mail->Body = "Hi, ".$usern."<br> Verification your email before access Yunmecoins, codes : <h3>".$verify."</h3>";

        // Success sent message alert
        $mail->send();

        session_start();


        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: '. $mail->ErrorInfo;
        } else {
            $_SESSION['univ'] = md5(date('H:i, d-m-Y'));
            session_start();
            $_SESSION['sesssions-s'] = "<div class='alert alert-success'>Sign Up in Yunmecoins successfully! Check your Email :)</div>";
            header('Location: ' . BASEURL.'s/confirm');
        }
    }
/*} else {
    session_start();
    $_SESSION['sesssions'] = "<div class='alert alert-danger'>Sign Up in Yunmecoins your not successfully</div>";
    header('Location: ' . BASEURL.'s/create/100');
    exit;
}*/
?>
