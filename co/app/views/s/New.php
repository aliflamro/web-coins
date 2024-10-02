<?php
session_start();

if (isset($_POST['submit'])) {
    $ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'secret' => '6LeAutgpAAAAAKjP-ximhzXwTjr7uD1DaH7sNB5c',
        'response' => $_POST['g-recaptcha-response'],
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $result = json_decode($response);


    $data['usern_109'] = $data['usern'];
    $data['email_789'] = $data['email'];
    $data['passw_689'] = htmlspecialchars($_POST['passw']);
    $data['repassw_790'] = htmlspecialchars($_POST['repassw']);
    $data['passw'] = md5($data['passw_689']);
    $data['repassw'] = md5($data['repassw_790']);
    if ($result->success) {
        if (strlen($data['passw_689']) > 8 && strlen($data['passw_689']) > 8) {
            if ($data['arr'] && $data['usern'] && $data['email_789'] && $data['passw'] == $data['repassw']) {
                if ($this->model('Register_model')->newSandi($data) > 0) {
                    session_start();
                    $_SESSION['usersas'] = "<div class='alert alert-success'>Change password in Yunmecoins your successfully!</div>";
                    header('Location: ' . BASEURL.'s');
                    exit;
                } else {
                    session_start();
                    $_SESSION['usersas'] = "<div class='alert alert-danger'>Change password in Yunmecoins your not successfully</div>";
                    header('Location: ' . BASEURL.'s/neew/'.$data['id_siid']);
                    exit;
                }
            } else {
                session_start();
                $_SESSION['usersas'] = "<div class='alert alert-danger'>Change password in Yunmecoins your not successfully</div>";
                header('Location: ' . BASEURL.'s/neew/'.$data['id_siid']);
                exit;
            }

        } else if (empty($data['passw_689']) || empty($data['passw_689'])) {
            session_start();
            $_SESSION['usersas'] = "<div class='alert alert-danger'>Change password in Yunmecoins your not successfully</div>";
            header('Location: ' . BASEURL.'s/neew/'.$data['id_siid']);
            exit;
        } else {
            session_start();
            $_SESSION['usersas'] = "<div class='alert alert-danger'>Change password in Yunmecoins your not successfully</div>";
            header('Location: ' . BASEURL.'s/neew/'.$data['id_siid']);
            exit;

        }
    } else {
        session_start();
        $_SESSION['usersas'] = "<div class='alert alert-danger'>Change password in Yunmecoins your not successfully</div>";
        header('Location: ' . BASEURL.'s/neew/'.$data['id_siid']);
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>    <link rel="icon" type="image/png" href="http://www.yunme.biz.id/image.png" />
    <title>My Login - Yunmecoins</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>assets/bootstrap/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>assets/icons/css/all.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>style.css" type="text/css" media="all" /><!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-113R93PHLH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-113R93PHLH');
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-113R93PHLH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-113R93PHLH');
</script>
</head>
<body class="max">
    <div class="px-4 pt-4">
        <h1 class="h2 m-0 mt-2 pt-1 fw-bold text-white">
            YUNME<i class="text-warning fa fa-coins"></i><span class="text-success">COINS</span>
        </h1>
        <div class="mb-2 text-white">
            Your new <span class="text-success">Password!</span> by <b>Yunme<span class="text-success">coins</span>.</b>
        </div>
        <?php

        echo $_SESSION['sstrt'];

        unset($_SESSION['sstrt']); ?>
        <form action="" method="POST" accept-charset="utf-8">
            <div class="d-flex flex-flow-wrap flex-md-column">
                <div class="col-12 col-md-4 mb-2">
                    <input type="password" name="passw" id="" class="form-control p-3 w-100 bg-dark border-bottom-s" placeholder="Password" autocomplete="off" />
                </div>
                <div class="col-12 col-md-4 mb-2">
                    <input type="password" name="repassw" id="" class="form-control p-3 w-100 bg-dark border-bottom-s" placeholder="Re-Password" autocomplete="off" />
                </div>
                <div class="col-12 mb-3 col-md-4 px-1">
                    <div class="g-recaptcha" data-sitekey="6LeAutgpAAAAAG6x1UeIFJwMBRr7cxqJxjP35yZH"></div>
                </div>
                <div class="col-12 col-md-4">
                    <button type="submit" name="submit" class="btn btn-success p-3 w-100 border-bottom-s">Continue</button>
                </div>
            </div>
        </form>
    </div>
    <?php

    Bracked::footer();

    ?>
    <script src="<?php echo BASEURL; ?>assets/bootstrap/bootstrap.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo BASEURL; ?>assets/bootstrap/bootstrap.bundle.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo BASEURL; ?>assets/icons/js/all.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>