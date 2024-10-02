<div class="px-4 pt-4">
    <a href="#" class="text-decoration-none"> <h1 class="h2 m-0 mt-2 pt-1 fw-bold text-white">
        YUNME<i class="text-warning fa fa-coins"></i><span class="text-success">COINS</span>
    </h1>
    </a>
    <div class="my-2 fw-bold d-flex">
        <a href="<?php echo BASEURL; ?>tasks" class="text-secondary text-decoration-none"><h2 class="h6 fw-bold m-0">Home</h2></a> <span class="mx-2">|</span>
        <a class="text-secondary text-decoration-none text-warning"><h2 class="h6 fw-bold m-0">Task</h2></a>
    </div>
    <?php Flasher::flashStart(); ?>
    <?php
    $no = 0;


    $no++;
    $data['getting'] = $this->model('User_model')->getUserByUsern($_SESSION['users_socs_798']);
    $data['yuto'] = $data['getting']['token'];

    $data['questions-to'] = $this->model('Tasks_model')->coinspayByYuQuest($data);

    $tokenid = $data['quest-tos']['token_answer'];
    $data['pay-to'] = $this->model('User_model')->coinsPayByYuQuest($tokenid);
    $data['yuqu'] = $tokenid;
    $data['data-to'] = $this->model('Tasks_model')->coinsByYuQuestions($data);
    if ($data['data-to']['yu_too'] == $data['yuto'] && $data['data-to']['yu_quest'] == $tokenid) {
        Flasher::setFlash(' Has Been Entered Coins!', 'and Tasks Succesfully!', 'success');
        header("Location: ".BASEURL."tasks");
        exit;
    } else {
        $toka = $data['quest-tos']['token_answer'];
        $data['rand-answers'] = $this->model('Tasks_model')->randomAnswers($toka);
        $useLink = $data['rand-answers']['linkscc'];
        $useAnswers = $data['rand-answers']['answersscv'];
        if(isset($_POST['send'])){
            session_start();
            $_SESSION['likes'] = $useAnswers;
            $_SESSION['yesnow'] = $_POST['yesnow'];
            $_SESSION['answers'] = $_POST['answers'];
            $_SESSION['answers-tokens'] = $_POST['answers-tokens'];
            $_SESSION['tokens_id'] = $_POST['tokens_id'];
            header('Location: '.BASEURL.'p/tasks_completes/'.$data['strlw-tokens']);
        }
            ?>
            <div class="d-flex flex-column">
                <div class="text-white col-12 col-md-3">
                    <form action="" method="post" accept-charset="utf-8">
                        <h2 class="fw-bold h6 my-2  <?php echo $display; ?>">
                            <i class="fa text-warning fa-coins"></i> <?php echo $data['coins-to']; ?> Coins | <span id="gVs"></span> <?php echo $data['quest-per-to']; ?> Questions | 1 Answer
                        </h2>
                        <div class="my-2  <?php echo $display; ?>">
                            You only need to fill in the questions below. If you finish you get your points.
                        </div>
                        <?php echo $success; ?>
                        <div class="my-2 <?php echo $display; ?>">
                            <h3 class="h6 fw-bold"><?php echo $data['quest-tos']['quest_title']; ?></h3><?php echo $data['quest-tos']['clue']; ?><a href="<?php echo BASEURL."p/loadpages/".$useLink; ?>" target="_blank" class="text-success">here!</a>
                        </div>
                        <div class="form-group <?php echo $display; ?>">
                            <label for="Taks 1" class="mb-2" style="font-size:14px;"><span class="text-warning fw-bold"><i class="fa fa-coins"></i><?php echo $data['quest-tos']['coins_per_quest']; ?></span> Coins / <?php echo $data['quest-tos']['tasks']; ?></label>
                            <input type="text" name="answers" id="taks1" class="form-control bg-dark w-100 border-bottom-s" placeholder="Answer" autocomplete="off">
                            <input autocomplete="off" type="hidden" name="tokens_id" id="taks1" class="form-control bg-dark w-100 border-bottom-s" value="<?php
                            $data['yu_tooss'] = $data['getting']['token'];
                            echo substr($data['yu_tooss'], 0, 8)."-".substr($data['yu_tooss'], 8, 8)."-".substr($data['yu_tooss'], 16, 8)."-".substr($data['yu_tooss'], 24, 8);

                            ?>">
                            <input autocomplete="off" type="hidden" name="answers-tokens" id="taks1" class="form-control bg-dark w-100 border-bottom-s" value="<?php
                            echo substr($data['quest-tos']['token_answer'], 0, 8)."-".substr($data['quest-tos']['token_answer'], 8, 8)."-".substr($data['quest-tos']['token_answer'], 16, 8)."-".substr($data['quest-tos']['token_answer'], 24, 8);
                            ?>">
                        </div>

                        <div class="my-2 <?php echo $display; ?>">
                            <h3 class="h6 fw-bold">Free Coins | End</h3>  You only need to fill in the questions below. If you finish you get your points, "yes" or "no".
                        </div>
                        <div class="form-group mb-2 <?php echo $display; ?>">
                            <label for="Taks 1" class="mb-2" style="font-size:14px;"><span class="text-warning fw-bold"><i class="fa fa-coins"></i>2</span> Coins / Have you followed the link above?</label>
                            <select name="yesnow" id="" class="form-control bg-dark w-100 border-bottom-s">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <div class="button-sending <?php echo $display; ?>">
                            <button type="submit" class="btn btn-success fw-bold w-100" name="send"><i class="fa fa-arrow-right"></i> Sending Answer</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        } ?>
    </div>