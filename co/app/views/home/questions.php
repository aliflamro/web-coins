<div class="px-4 pt-4">
    <a href="<?php echo BASEURL; ?>tasks" class="text-decoration-none"> <h1 class="h2 m-0 mt-2 pt-1 fw-bold text-white">
        YUNME<i class="text-warning fa fa-coins"></i><span class="text-success">COINS</span>
    </h1>
    </a>
</div>
<div class="my-3 text-white px-4">
    <div class="my-3 alert alert-secondary">
        <h3 class="h6 m-0 fw-bold">
            Questions
        </h3>
        Complete daily quest with just one click and you get the points listed.
    </div>
    <hr />
    <div class="d-flex flex-flow-wrap">
        <?php
        foreach ($data['questions-him'] as $item) {
                $data['getting-too'] = $this->model('User_model')->getUserByUsern($_SESSION['users_socs_798']);
                $data['yutooos'] = $data['getting-too']['token'];
                $data['yuquests'] = $item['token_answer'];
                
                $data['coins-yuto'] = $this->model('User_model')->successYuCoinsQuest($data);
                $tokenTasks = $data['coins-yuto']['yu_quest'];
                if ($tokenTasks) {
                    $check = "<i class='fa fa-check-circle text-success'></i>";
                } else {
                    $check = "";
                }
            ?>
            <div class="col-12 col-md-6">
                <div class="box">
                    <div class="card bg-dark d-flex p-3 rounded-0 text-white border-bottom-2 border-secondary">
                        <b class="m-0 text-small text-secondary"><i class="fa fa-globe"></i> <?php echo $item['count_quest_to']; ?> Question - 1 Min in Publisher <?php echo $check; ?></b>
                        <h4 class="h6 fw-bold my-1"><?php echo $item['quest_title']; ?></h4>
                        <small class="text-white"><i class="fa fa-coins text-warning"></i> <?php echo $item['coins_per_quest']; ?> Coins | 
                            <a class="my-2 text-decoration-none text-success w-100" href="<?php echo $item['link']; ?>">Click Here!</a></small>
                    </div>
                </div>
                <hr>
            </div>
            <?php
    
        } ?>
    </div>
</div>
</div>