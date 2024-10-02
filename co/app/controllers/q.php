<?php


class q extends Controller {
    public function index() {
        header("Location: ".BASEURL."tasks");
    }
    public function tasksto($id) {
        Flasher::sessions();
        $token = substr($id, 0, 8);
        $tokenDua = substr($id, 8, 8);
        $generate = substr(md5(rand(0, 99999)), 0, 8);
        $generateDua = substr(md5(date("H:i D/M/Y")), 0, 8);
        $bytokens = $tokenDua."-".$generate."-".$token."-".$generateDua;
        if ($id) {
            $_SESSION['strlw'] = $id;
            $_SESSION['users'] = $_SESSION['users_socs'];
            header("Location: ".BASEURL."q/completefortasks/".$bytokens."-".$_SESSION['users']);
        }else{
            header("Location: ".BASEURL."tasks");
        }
    }
    public function completefortasks($id) {
        $token = $_SESSION['strlw'];
        $sessions = $_SESSION['users'];
        $tokenSatu = substr($token, 0, 8);
        $tokenDua = substr($token, 8, 8);
        $tokenTiga = $tokenSatu."h1s".$tokenDua;
        
        $exp = explode("-", $id);
        $tokenDuaJBP = $exp[0];
        $tokenDuaJBS = $exp[1];
        $tokenDuaJBH = $exp[2];
        $tokenDuaJBK = $exp[3];
        $tokenDuaJBL = $exp[4];
        $tokenDuaJBKMK = $exp[5];
        $tokenDuaJBKM = $exp[6];

        $tokenDuaJBB = $tokenDuaJBH = $exp[2]."h1s".$tokenDuaJBP;
        $sess = $tokenDuaJBL."-".$tokenDuaJBKMK."-".$tokenDuaJBKM;

        if ($sessions == $sess && $token && $tokenTiga == $tokenDuaJBB && $tokenDuaJBP == $tokenDua) {
            Flasher::sessions();
            $data['quest-tos'] = $this->model('Tasks_model')->gettingTokenQuestionsOpi($token);
            $taken = $data['quest-tos']['roles'];
            
            $ecpload = explode("_",$taken);
            
            $data['tasks-to'] = $this->model('Tasks_model')->gettingTokenTasks($ecpload[1]);
            $data['sessions-start'] = $sessions;
            $data['strlw-tokens'] = $token;
            $data['coins-to'] = $data['tasks-to']['coins'];
            
            $data['quest-per-to'] = $data['tasks-to']['count_quest'];
            $data['roles'] = $data['tasks-to']['title']."_".$data['tasks-to']['token_id'];
            
            if($data['quest-tos']['token_answer']){
                
                
            $this->view('templates/header');
            $this->view('quest/index',$data);
            $this->view('templates/footer');
            }else {
            Flasher::setFlash(' Access | Your in Log In For Access!', 'Click Back Website Url!', 'danger');
            header("Location:".BASEURL);
            exit;
        }
                
            } else {
            Flasher::setFlash(' Access | Your in Log In For Access!', 'Click Back Website Url!', 'danger');
            header("Location:".BASEURL);
            exit;
        }
    }
}