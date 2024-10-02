<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Login - Yunmecoins</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">    <link rel="icon" type="image/png" href="http://www.yunme.biz.id/image.png" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>assets/bootstrap/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>assets/icons/css/all.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>style.css" type="text/css" media="all" /><!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-113R93PHLH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-113R93PHLH');
        <!-- Google tag (gtag.js) --> < script async src = "https://www.googletagmanager.com/gtag/js?id=G-113R93PHLH" >
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-113R93PHLH');
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="max">
    <div class="px-4 pt-4">
        <h1 class="h2 m-0 mt-2 pt-1 fw-bold text-white">
            YUNME<i class="text-warning fa fa-coins"></i><span class="text-success">COINS</span>
        </h1>
        <?php Bracked::htmlBrackeg_1070(); ?>
        <div class="mb-2 text-white">
            Log In your account, You can started for earning money with <b>Yunme<span class="text-success">coins</span>.</b>
        </div>
        <?php Flasher::flash();
        echo $_SESSION['usersas'];

        unset($_SESSION['usersas']);

        ?>

        <form action="<?php echo BASEURL; ?>p/prosessLogin" method="POST" accept-charset="utf-8">
            <div class="d-flex flex-flow-wrap flex-md-column">
                <div class="col-12 col-md-4">
                    <input type="text" name="usern" id="" class="form-control p-3 w-100 bg-dark border-bottom-s" placeholder="Username" autocomplete="off" />
                </div>
                <div class="col-12 my-3 col-md-4">
                    <input type="password" name="passw" id="" class="form-control p-3 w-100 bg-dark border-bottom-s" placeholder="Password" autocomplete="off" />
                </div>
                <div class="col-12 mb-3 col-md-4 px-1">
                    <div class="g-recaptcha" data-sitekey="6LeAutgpAAAAAG6x1UeIFJwMBRr7cxqJxjP35yZH"></div>
                </div>
                <div class="col-12 col-md-4">
                    <input type="submit" value="Continue" class="btn btn-success p-3 w-100 border-bottom-s">
                </div>
            </div>
        </form>
        <?php Bracked::htmlBrackVery_102(); ?>
    </div>
    <?php

    Bracked::footer();

    ?>
    <script src="<?php echo BASEURL; ?>assets/bootstrap/bootstrap.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo BASEURL; ?>assets/bootstrap/bootstrap.bundle.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo BASEURL; ?>assets/icons/js/all.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>