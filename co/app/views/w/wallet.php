<div class="px-4 pt-4">
        <a href="#" class="text-decoration-none"> <h1 class="h2 m-0 mt-2 pt-1 fw-bold text-white">
            YUNME<i class="text-warning fa fa-coins"></i><span class="text-success">COINS</span>
        </h1>
        </a>
                <div class="my-2 fw-bold d-flex">
<?php Bracked::showNav_wallets(); ?>
</div>
        <div class="my-3 text-white">
            <div class="d-flex flex-flow-wrap">
                <div class="col-12 col-md-6">
                    <div class="box">
                        <div class="card bg-dark d-flex p-3 rounded-0 text-white border-bottom-2 border-secondary">
                            <div class="fw-bold">
                                <b>IDR</b>
                                <span><?php echo $data['idr_330']; ?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <a href="<?php echo BASEURL; ?>wallets/pay" class="btn btn-success">
                            PAYMENT METHOD
                        </a>
                    </div>
                    <hr />
                </div>
            </div>
            <div class="mb-2">
                <div class="my-2 text-white">
                    <h3 class="h6 m-0 fw-bold">High Fives & Terms</h3>
                    Click Payment Method to start withdrawal. Disbursement will be fulfilled if your balance has reached the specified number. As a notification, the admin will get an email from the email address of your Yunmecoins account. Make sure your Email Address and Fund wallet account are valid. Withdrawal conditions are 1 time per 3 - 14 days. Payment will come via the email we send.
                    <h3 class="h6 m-0 fw-bold">Rate Market of years </h3>
                    
                    IDR 5000,00 ≈ 1 Dollar USD of 2024 in Yunmecoins.
                    <h3 class="h6 m-0 fw-bold">Rate YC In  Yunmecoins </h3>
                  <i class="fa text-warning fa-coins"></i>  100000 YC ≈ IDR 5,00
                </div>
                <hr />

                <blockquote class="p-3 alert alert-warning">
                    <h3 class="h6 fw-bold">
                        Informations
                    </h3>
                    <p>
                        You need to pay attention that your wallet account is encrypted. You can delete your wallet if you are worried about an unexpected hack attack. Deletion can be done if you have requested a withdrawal of funds. You can delete it again for your security and convenience.
                    </p>
                    <p>
                        In case of cheating we will ban your Yunme account permanently. Please avoid this when it comes to trust.
                    </p>
                    <p>
                        If payment is slow, you can submit an email to the Google email contact businesscodeshelping@gmail.com
                    </p>
                </blockquote>
            </div>
            <hr />
        </div>
        <div class="text-white">
            <h5 class="fw-bold h6">History</h5>
            
            <?php
            
            foreach ($data['history'] as $row){
                if($data['getting']['token'] == $row['yu_too']){
                    
                    $srow = $this->model('User_model')->successYuQuest($row['yu_quest']);
                    $excpl = explode("_",$srow['roles']);
            ?>
            <div class="my-2">
               <p class="m-0"><?php echo $srow['quest_title']; ?> <br> <span style="font-size:12px;">
                   Coins : <i class="fa fa-coins text-warning"></i> <?php echo $row['coins']; ?> <span class="text-success">Claim's</span> <br></p>
               <p style="font-size:12px" class="m-0">
                   Token : <?php echo substr($row['yu_too'],0,8)."-".substr($row['yu_quest'],8,8)."-".substr($row['yu_too'],16,8)."-".substr($row['yu_quest'],24,8); ?>
               </p>
               <p><span style="font-size:12px;">Dates : <?php echo $row['dates']; ?></span></span></p>
            </div>
            <?php 
                }else{
                    
                }
                    
                } 
            ?>
        </div>
        <div class="text-white">            <h5 class="fw-bold h6">History Referrals</h5>
            <?php
            
            foreach ($data['refferally'] as $rowas){
                if($rowas['token_i'] == $data['getting']['token']){
                    $data['uuu'] = $this->model('User_model')->getUserByTokenSucc($rowas['token_u']);
                    
                    
                    if(!$data['uuu']){
                        $usernames = "Unknown Users";
                    }else{
                        $usernames = "<i class='text-warning'>".$data['uuu']['usern']."</i> to <b>".$data['getting']['usern']."</b>";
                    }
            ?>
            <div class="my-2">
               <p class="m-0"><?php echo $usernames; ?> <br> <span style="font-size:12px;">
                   Coins : <i class="fa fa-coins text-warning"></i> <?php echo $rowas['coins']; ?> • <?php
                     if($usernames == "Unknown Users"){
                         if($this->model('User_model')->deleteNotClaim($rowas['token_u'])){
                             echo "Deletes";
                         }
                     }else{
                   ?><span class="text-success">Claim's</span> <?php } ?> <br></p>
               <p style="font-size:12px" class="m-0">
                   Token : <?php echo substr($rowas['token_u'],0,8)."-".substr($rowas['token_i'] ,8,8)."-".substr($rowas['token_u'] ,16,8)."-".substr($rowas['token_i'] ,24,8); ?>
               </p>
               <p><span style="font-size:12px;">Dates : <?php echo $rowas['dates']; ?></span></span></p>
            </div>
            <?php 
                }else{
                    
                }
                    
                } 
            ?>
        </div>
    </div>