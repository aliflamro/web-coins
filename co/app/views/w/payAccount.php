<div class="bg-dark vh-min-100 text-white p-4 ">
    <?php echo $_SESSION['credit-not-out']; unset($_SESSION['credit-not-out']);
    $tasks_co += $data['coins-too']['coins'];
    $referrals_co += $data['succ-too']['coins'];
    $coinsOuter += $data['balances-too'] ['cooins'];

    $cooooinness = $tasks_co + $referrals_co - $coinsOuter;
    
    
    
    ?>
    <h1 class="m-0 fw-bold h5">
        PAYMENT <span class="text-success">METHOD</span> <a href="<?php echo BASEURL; ?>wallets" class="btn btn-success" style="font-size:14px;">Back</a>
    </h1>
    <?php


    if ($data['users-mail']['yu_too'] == $data['users-co']['token']) {
        ?>
        <div class="alert my-4 alert-dark p-4">
            <p class="m-0">
                Name Receiver : <?php echo $data['users-mail']['name']; ?>
            </p>
            <p class="m-0">
                Email : <?php $em = base64_decode($data['users-mail']['email']);
                $expa = explode("@", $em);
                echo substr($expa[0], 0, 6)."xxxx@".substr($expa[1], 0, 2)."xxx";

                ?>
            </p>
            <p class="m-0">
                Numb. Phone : <?php $num = base64_decode($data['users-mail']['number_phone']); echo substr($num, 0, 6)."xxxxx"; ?>
            </p>
            <p class="m-0">
                Coins : <?php 
                
                if($cooooinness > 200000000){
                    $succ = "text-success";
                    $real = "Coins can be exchanged";
                }else{
                    $succ = "text-danger";
                    $real = "Not Claim's";
                }
                ?>
                <b>
<?php echo $cooooinness;
                ?></b>
          <span class="<?php echo $succ; ?>"><?php echo $real; ?>                </span>       
            </p>
            <?php
            $rolepay = base64_decode($data['users-mail']['roles_pay']);

            if ($rolepay == "Pending") {

                ?>
                <p class="my-2">
                    Withdrawal to (<?php
                    $eal += $data['users-count']['yu_too'];

                    echo $eal;
                    ?>) <span class="badge bg-warning">
                        Pending!
                    </span>
                </p>
                <?php
            } else if ($rolepay == "Successfully") {
                ?>
                <p class="mt-2">
                    Withdrawal to (<?php
                    $eal += $data['users-count']['yu_too'];

                    echo $eal;
                    ?>) <span class="bg-success badge">
                        Successfully!
                    </span> Request a Recall?
                    <?php
                    
                if(isset($_POST['onload']))
                   {
                   header("Location: ".BASEURL."wallets/resend/"); 
                   }?>
                    <form action="" method="POST" class="m-0">
                        <button id="no-action" type="submit" name="onload" class="btn btn-success"> Sending Again!</button>
                    </form>
                </p>
                <?php
            } else {
                ?>
                <p class="my-2">
                    Request <span class="text-danger">
                        No Withdrawal!
                    </span>
                </p>
                <?
            }
            ?>
        </div>
        <?php
    } else {

        ?>
        <div class="d-flex flex-column">
            <form action="<?php
                echo BASEURL; ?>wallets/payOuts" class="col-12 col-md-4"method="post" accept-charset="utf-8">

                <div class="alert-warning alert mt-2" style="font-size:12px;">
                    <b>Informations</b>
                    <p class="m-0">
                        You can delete your wallet if you are worried about an unexpected hack attack. Send request to Mail businesscodeshelping@gmail.com.
                    </p>
                </div>
                <div class="form-group my-2">
                    <label for="Name Receiver" class="my-1">Name Receiver</label>
                    <br />
                    <input type="text" name="names" id="" placeholder="Name Receiver" class="form-control bg-dark border-bottom-s" />
                </div>
                <div class="form-group my-2">
                    <label for="Email" class="my-1">Receive Email Anddress</label>
                    <br />
                    <input type="email" name="email" id="" placeholder="Email" class="form-control bg-dark border-bottom-s" />
                </div>
                <div class="form-group my-2">
                    <label for="Number Phone" class="my-1">Number Phone</label>
                    <br />
                    <input type="number" name="numb_phone" id="" placeholder="+62" class="form-control bg-dark border-bottom-s" />
                </div>
                <div class="form-group mt-2">
                    <label for="Number Phone">Credits</label>
                    <br />
                    <?php
                    if ($cooooinness > 200000000) {
                        $setting = "text-success";
                        $settingSuc = "fa fa-check-circle";
                    } else {
                        $setting = "text-warning";
                        $settingSuc = "fa fa-exclamation-square";
                    }

                    ?>
                    <div class="mb-1 <?php echo $setting; ?>">

                        <span style="font-size:12px;"><i class="<?php echo $settingSuc; ?>"></i> Minimum withdrawal <?php
                            echo $cooooinness;
                            echo "/";
                            echo "200000000";
                            ?>  Coins</span>
                    </div>
                    <input type="text" name="pulse" id="" placeholder="Electric Pulse ≈ IDR10000" class="form-control bg-dark border-bottom-s" disabled />
                </div>
                <div class="mb-2 text-danger">
                    <span style="font-size:12px;"><i class="fa fa-exclamation-circle"></i> Payment Method Dana & Paypal is Maintance.</span>
                </div>
                <div class="col-12 mb-3 col-md-4 px-1">
                    <div class="g-recaptcha" data-sitekey="SITE-KEY"></div>
                </div>
                <div class="form-group my-3">
                    <button type="submit" name="sending-data" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
        <?php
    } ?>

    <div class="text-white">
        <h5 class="fw-bold h6">History Transactions</h5>
        <?php

        foreach ($data['successcoins'] as $rowas) {
            if ($rowas['yu_too'] == $data['users-co']['token']) {
                ?>
                <div class="my-2">
                    <p class="m-0">
                        <?php echo $rowas['name']; ?> <br> <span style="font-size:12px;">
                            Coins : <i class="fa fa-coins text-warning"></i> <?php echo $rowas['credits']; ?> • <?php
                            $rolesBuy = base64_decode($rowas['roles_pay']);
                            if ($rolesBuy == "Pending") {
                                ?>
                                <span class="text-warning">Pending</span>
                                <?php
                            } else if ($rolesBuy == "Successfully") {
                                ?>
                                <span class="text-success">Successfully!</span>
                                <?php
                            } else {

                                ?>
                                <span class="text-danger">Not Transactions!</span>
                                <?php
                            } ?>
                        </p>
                        <p style="font-size:12px" class="m-0">
                            Token : <?php echo strtolower(substr($rowas['yu_too'], 0, 8)."-".substr($rowas['email'], 8, 8)."-".substr($rowas['yu_too'], 16, 8)."-".substr($rowas['number_phone'], 8, 8)); ?>
                        </p>
                        <p>
                            <span style="font-size:12px;">Dates : <?php echo $rowas['dates']; ?></span></span>
                    </p>
                </div>
                <?php
            } else {
                echo "";
            }

        }
        ?>
    </div>
</div>
