# Yunmecoins 👋
![image](banner-small.jpg)
### Change Your Service in Yunmecoins File for Baseurl and Database

./App
- config.php

./
- signup.php
- forgot.php

### Git Clone
```
git clone https://github.com/aliflamro/web-coins.git
```
### PHPMailer
```
git clone
```
### Chaptcha Google
Your using codes in public function or class
```
$ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => 'TOKEN-KEY',
            'response' => $_POST['g-recaptcha-response'],
      ]);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      $result = json_decode($response);
```
Your can change Tokenkey Secret with Tokenkey Chaptcha in Here
```
'secret' => 'TOKEN-KEY',
```
Your Using codes in head
```
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
```
And Your Using Codes in form
```
<div class="g-recaptcha" data-sitekey="Site-Key"></div>
```
### Information
information: [x.com/scroooling](x.com/scroooling)
### © 2024 - 2025 Copyrights
