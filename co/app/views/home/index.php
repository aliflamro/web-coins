<div class="px-4 pt-4">
    <a href="#" class="text-decoration-none"> <h1 class="h2 m-0 mt-2 pt-1 fw-bold text-white">
        YUNME<i class="text-warning fa fa-coins"></i><span class="text-success">COINS</span>
    </h1>
    </a>

    <?php
    Flasher::flash();
    $data['getting'] = $this->model('User_model')->getUserByUsern($_SESSION['users_socs_798']);

    $taken = $data['getting']['token'];

    $data['getting-u'] = $this->model('User_model')->succ_reff($taken);
    $data['getting-i'] = $this->model('User_model')->succ_reffIs($taken);
    $data['balance-too'] = $this->model('User_model')->balancetoo($taken);
        
    

    $data['getting-coinsAll'] = $this->model('User_model')->succ_reffAll("725");

    $cooins_reffAll += $data['getting-coinsAll']['coins'];
    $cooinsOut = $data['balance-too']['cooins'];
    
    $data['start'] = $this->model('User_model')->getCoinsByToken($data['getting']['token']);
    $oop = $data['getting']['token'];
    $data['coinster'] = $this->model('User_model')->coinsPayCounts($data['getting']['token']);
    ?>
    <div class="my-2 fw-bold d-flex">
        <span class="text-white fw-bold" style="position:relative;top:-2.75px;">
            <i class="fa fa-coins text-warning"></i> <?php
            $cooins = $data['start']['coins'];
            
        
            $cooins_reff += $data['getting-i']['coins'];
        
        
            if ($cooins > '1' || $cooins_reff > 1 || $cooinsOut) {
                echo $cooins + $cooins_reff - $cooinsOutl;
            } else {
                echo "0";
            }
            ?> YC </span> <span class="mx-2">|</span>
        <?php
        Bracked::showNav_tasks();
        ?>
    </div>
    <div class="my-3 text-white">
        <div class="mb-2">
            <blockquote class="p-3 alert alert-warning">
                <h3 class="h6 fw-bold">
                    Informations to  @<?php echo $_SESSION['users_socs_798']; ?>
                </h3>
                <p>
                    Completed tasks will be loaded every day. If the coins don't come in, the coins you get will automatically start from the beginning. Each task has its own license and conditions.
                </p>
                <p class="m-0">
                    By following the link you can find out which tasks need to be done.
                </p>
                <p class="m-0">
                    <i class="fa fa-users"></i> <?php echo $data['count']; ?> Users Joined <br>
                    <i class="fa fa-coins"></i> <?php
                    foreach ($data['coinster'] as $rowa) {
                        echo $rowa['coins'] + $cooins_reffAll;

                    }
                    ?> Coins Out
                </p>
            </blockquote>
        </div>
        <div class="my-2 alert-success alert">
            <h3 class="h6 fw-bold">
                Referral's
            </h3>
            <p class="m-0"style="word-break: break-all;">
                Share your  Referral code for friend's. You can claim <b><i class="fa fa-coins"></i> 725 YC</b> one's person. <br>
                <b>Referral Code : <?php echo $_SESSION['users_socs_798']; ?></b>
            </p>
            <div class="">
                <label for="Refferal" class="my-2"><i class="fa fa-link"></i> Copy & Share Link</label>
                <input class="form-control w-100 border-bottom-s bg-dark py-2 px-3" type="text" name="reff" value="<?php echo BASEURL; ?>reff/claim/<?php echo $_SESSION['users_socs_798']; ?>" />
            </div>
            <?php

            if ($data['getting-u']['token_u'] == $taken) {
                echo "";
            } else {
                ?>
                <form action="<?php echo BASEURL; ?>reff/referralcode" method="POST">
                    <label for="Refferal" class="my-2"><i class="fa fa-tag"></i> Enter Your Codes</label>
                    <div class="d-flex">
                        <input class="form-control w-100 border-bottom-s bg-dark py-2 px-3" type="text" name="reff" <?php
                        
                        if($_SESSION['refferals-codes']){
                            ?>
                            value="<?php echo $_SESSION['refferals-codes']; ?>"
                            <?php
                        }else{
                        
                        ?>
                        
                        placeholder="Example: Yunmecoins" 
                        <?php } ?>
                        />
                        <button type="submit" name="reffs" class="btn btn-dark border-bottom-s text-success py-2 px-3" style="margin-left:5px;">
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
                <?php
            } ?>
        </div>
        <div class="my-3 alert alert-secondary">
            <h3 class="h6 m-0 fw-bold">
                Task
            </h3>
            Complete daily tasks with just one click and you get the points listed.
        </div>
        <hr />
        <div class="d-flex flex-flow-wrap">
            <?php



            foreach ($data['tasks_78'] as $item) {
                echo $quest;
                $data['getting-too'] = $this->model('User_model')->getUserByUsern($_SESSION['users_socs_798']);
                $data['yutooos'] = $data['getting-too']['token'];
                $data['yutasksss'] = $item['token_id'];
                

                ?>
                <div class="col-12 col-md-6">
                    <div class="box">
                        <div class="card bg-dark d-flex p-3 rounded-0 text-white border-bottom-2 border-secondary">
                            <b class="m-0 text-small text-secondary"><i class="fa fa-globe"></i> <?php echo $item['title_site']; ?> - <?php echo $item['times']; ?> in Publisher</b>
                            <h4 class="h6 fw-bold my-1"><?php echo $item['title']." ". $check; ?></h4>
                            <small class="text-white"><i class="fa fa-coins text-warning"></i> <?php echo $item['coins']; ?> Coins | <?php echo $item['count_quest']; ?> Question |
                                <a class="my-2 text-decoration-none text-success w-100" href="<?php echo BASEURL; ?>tasks/questions/<?php echo base64_encode($item['title']."_".$item['token_id']); ?>">Click Here!</a></small>
                        </div>
                    </div>
                    <hr>
                </div>
                <?php
            } ?>
        </div>
    </div>
</div>