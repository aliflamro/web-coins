<?php
$con = mysqli_connect('DB_HOST','DB_USER','DB_PASS','DB_BAME');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/POP3.php';
require 'PHPMailer/src/SMTP.php';

date_default_timezone_set("Asia/Jakarta");
$nama = '';
$usern = htmlspecialchars($data['daftar_555']['usern']);
$email = htmlspecialchars($data['daftar_555']['email']);
$passw = htmlspecialchars($data['daftar_555']['passw']);
$passwHash = md5(htmlspecialchars($passw));
$verify = md5($email)."&".rand(0.999999);
$token = md5($email.date('Y-m-d'));
$dates = date("H:i, d-m-Y");


$sql = "SELECT * FROM yuusersco where email='$email'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) > 0) {
    Flasher::setFlash('telah', 'terdaftar', 'danger');
    header('Location: ' . BASEURL);
    exit;
} else {
    $sql = "INSERT INTO yuusersco (nama,usern,email,passwHash,verify,token,dates)VALUES('$nama','$usern','$email','$passwHash','$verify','$token','$dates')";
    $query = mysqli_query($con, $sql);

    //Create a new PHPMailer instance
    $mail = new PHPMailer;

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    // SMTP::DEBUG_OFF = off (for production use)
    // SMTP::DEBUG_CLIENT = client messages
    // SMTP::DEBUG_SERVER = client and server messages
    $mail->SMTPDebug = SMTP::DEBUG_OFF;

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

    //Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'yunmefreecoins@gmail.com';

    //Password to use for SMTP authentication
    $mail->Password = 'Kepoloh09a@';

    //Set who the message is to be sent from
    $mail->setFrom('yunmefreecoins@gmail.com', 'no-reply');

    //Set an alternative reply-to address
    //$mail->addReplyTo('replyto@example.com', 'First Last');

    //Set who the message is to be sent to
    $mail->addAddress($email, $nama);

    //Set the subject line
    $mail->Subject = 'Verification Account - Yunmecoins';

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $body = "Hi, ".$nama."<br>Plase Verification your email before access our website : <br> ".BASEURL."p/verify/".$verify."<br><br><br> <center><a href='".BASEURL."p/verify/".$verify."' style='padding:10px;border-radius:5px; box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px; color:#fff; background-color: #3b7aae; border:none;'>Verification Account</a></center>";
    $mail->Body = $body;
    //Replace the plain text body with one created manually
    $mail->AltBody = 'Verification Account';

    //send the message, check for errors
    if (!$mail->send()) {
        echo 'Mailer Error: '. $mail->ErrorInfo;
    } else {
        Flasher::setFlash('gagal', 'mendaftar', 'danger');
        header('Location: ' . BASEURL.'s/create');
        exit;
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
    }

}
?>