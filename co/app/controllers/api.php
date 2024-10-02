<?php

class api extends Controller {
    public function index() {
        header("Location: ".BASEURL);
    }
    public function create() {
        if ($this->model("Apis_model")->createTasks($_POST) > 0) {

            $json = json_encode($_POST);
            if ($json) {
                echo "[Successfuly] : " .$json;
            } else {
                echo "Not Data";
            }

        } else {
            echo "Not Data";
        }
    }
    public function create_api_5666dah86klo422($id) {
        $exap = explode("=", $id);
        $posts = $_POST;
        if ($exap[0] == $_POST['token']) {
            if ($this->model("Apis_model")->createAnswers($_POST) > 0) {

                $json = json_encode($_POST);
                if ($json) {
                    echo "[Successfuly] : " .$json;
                } else {
                    echo "Not Data";
                }

            } else {
                echo "Not Data";
            }
        }
    }
    public function api_createGuest($id) {
        if ($id == "1618199171718191917") {
            if ($this->model("Apis_model")->createQuest($_POST) > 0) {

                $json = json_encode($_POST);
                if ($json) {
                    echo "[Successfuly] : " .$json;
                } else {
                    echo "Not Data";
                }

            } else {
                echo "Not Data";
            }
        } else {
            echo "Not Data";
        }
    }
    public function readapis() {
        $result = $this->model('Apis_model')->gettAllData();
        $usr = "86196167";
        $token = md5($usr);
        if ($result && $usr == $usr && $token) {
            $itemRecords = array();
            $itemRecords[$token] = array();
            foreach ($result as $item) {
                extract($item);
                $itemDetails = array(
                    "id_tasks" => $id_tasks,
                    "tasks_to" => $tasks_to,
                    "title" => $title,
                    "title_site" => $title_site,
                    "times" => $times,
                    "coins" => $coins,
                    "count_quest" => $count_quest,
                    "url" => $url,
                    "roles" => $roles,
                    "token_id" => $token_id
                );
                array_push($itemRecords[$token], $itemDetails);
            }
            http_response_code(200);
            echo json_encode($itemRecords);
        } else {
            http_response_code(404);
            echo json_encode(
                array("message" => "No item found.")
            );
        }
    }
    public function api_577readapis_quest($id) {
        $ecxa = base64_decode($id);
        $resultu['dasa'] = $this->model('Apis_model')->getDataQuest($ecxa);
        $usr = "738288282882818";
        $token = md5($usr);
        if ($resultu && $usr == $usr && $token) {
            $itemRecords = array();
            $itemRecords[$token] = array();
            foreach ($resultu['dasa'] as $item) {
                extract($item);
                $itemDetails = array(
                    "id_quest" => $id_quest,
                    "clue" => $clue,
                    "coins_total" => $coins_total,
                    "count_quest_to" => $count_quest_to,
                    "quest_title" => $quest_title,
                    "link" => $link,
                    "answer" => $answer,
                    "token_answer" => $token_answer,
                    "tasks" => $tasks,
                    "coins_per_quest" => $coins_per_quest,
                    "roles" => $roles,
                    "dates" => $dates
                );
                array_push($itemRecords[$token], $itemDetails);
            }
            http_response_code(200);
            echo json_encode($itemRecords);
        } else {
            http_response_code(404);
            echo json_encode(
                array("message" => "No item found.")
            );
        }
    }
    public function readapis_id($id) {
        $result['tasks'] = $this->model('Apis_model')->getDataTasks_id($id);
        $usr = "86196167";
        $token = md5($usr);
        if ($result['tasks'] && $usr == $usr && $token) {

            $itemRecords = array();
            $itemRecords[$token] = array();
            foreach ($result as $item) {
                extract($item);
                $itemDetails = array(
                    "id_tasks" => $id_tasks,
                    "tasks_to" => $tasks_to,
                    "title" => $title,
                    "title_site" => $title_site,
                    "times" => $times,
                    "coins" => $coins,
                    "count_quest" => $count_quest,
                    "url" => $url,
                    "roles" => $roles,
                    "token_id" => $token_id
                );
                array_push($itemRecords[$token], $itemDetails);
            }

            http_response_code(200);
            echo json_encode($itemRecords);

        } else {
            http_response_code(404);
            echo json_encode(
                array("message" => "No item found.")
            );
        }
    }
    public function api_a616ah818lal71($id) {

        $tokens = "yunmecoins_api=2f79eaa1-280424-cb143b407";
        $exp = explode("=", $id);
        $esc = explode("-", $exp[1]);
        $ecs = explode("=", $tokens);


        if ($exp[1] == $ecs[1] && $esc[1] == "280424" && $esc[0] == "2f79eaa1") {
            $resulty = $this->model('Apis_model')->getAllDataUsersY();
            $usr = "ORDER-FB@YUNMECAVEN=009";
            $token = $usr;
            if ($resulty && $usr == $usr && $token) {
                $itemRecords = array();
                $itemRecords[$usr] = array();
                foreach ($resulty as $item) {
                    extract($item);
                    $itemDetails = array(
                        "id_users" => $id_users,
                        "nama" => $nama,
                        "usern" => $usern,
                        "email" => $email,
                        "verify" => $verify,
                        "token" => $token,
                        "dates" => $dates
                    );
                    array_push($itemRecords[$usr], $itemDetails);
                }
                http_response_code(200);
                echo json_encode($itemRecords);
            } else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No item found.")
                );
            }

        } else {
            header("Location: ".BASEURL);
        }
    }

    public function apissa_uhq861jaoquaja($id) {
        $tokens = "yunmecoins_apib=2f79eaa1-280424-cb143b407";
        $exp = explode("=", $id);
        $esc = explode("-", $exp[1]);
        $ecs = explode("=", $tokens);


        if ($exp[1] == $ecs[1] && $esc[1] == "280424" && $esc[0] == "2f79eaa1") {
            $resulty['data'] = $this->model('Apis_model')->getAllDataOnBan();
            $usr = "ORDER-FB@YUNMECAVEN=008";
            $tokenkey = $usr;
            if ($resulty && $usr == $usr && $tokenkey) {
                $itemRecords = array();
                $itemRecords[$usr] = array();
                foreach ($resulty['data'] as $item) {
                    extract($item);
                    $itemDetails = array(
                        "id_succ" => $id_succ,
                        "token_sce" => $token_sce,
                        "statussce" => $statussce,
                        "tokensce" => $tokensce,
                        "dateat" => $dateat
                    );
                    array_push($itemRecords[$usr], $itemDetails);
                }
                http_response_code(200);
                echo json_encode($itemRecords);
            } else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No item found.")
                );
            }

        } else {
            header("Location: ".BASEURL);
        }
    }
    public function coins_u61ka71pq07($id) {
        $resultCoins['coins'] = $this->model('Apis_model')->getCoinsByTokens($id);
        $usr = "ORDER-FB@YUNMECAVEN=009";
        $token = $usr;
        if ($resultCoins['coins'] && $usr == $usr && $token) {
            $itemRecords = array();
            $itemRecords[$usr] = array();
            foreach ($resultCoins['coins'] as $item) {
                extract($item);
                $itemDetails = array(
                    "coins" => $coins,
                    "yu_too" => $yu_too,
                    "yu_quest" => $yu_quest,
                    "dates" => $dates
                );
                array_push($itemRecords[$usr], $itemDetails);
            }
            http_response_code(200);
            echo json_encode($itemRecords);
        } else {
            http_response_code(404);
            echo json_encode(
                array("message" => "No item found.")
            );
        }
    }
    public function api_quest_18262919196($id) {
        $resultQuest['coins'] = $this->model('Apis_model')->getQuestByIdOp($id);
        $usr = "ORDER-FB@YUNMECAVEN=009";
        $token = $usr;
        if ($resultQuest && $usr == $usr && $token) {
            $itemRecords = array();
            $itemRecords[$usr] = array();
            foreach ($resultQuest as $item) {
                extract($item);
                $itemDetails = array(
                    "id_quest" => $id_quest,
                    "clue" => $clue,
                    "count_quest_to" => $count_quest_to,
                    "quest_title" => $quest_title,
                    "link" => $link,
                    "answer" => $answer,
                    "token_answer" => $token_answer,
                    "tasks" => $tasks,
                    "coins_per_quest" => $coins_per_quest,
                    "roles" => $roles,
                    "dates" => $dates
                );
                array_push($itemRecords[$usr], $itemDetails);
            }
            http_response_code(200);
            echo json_encode($itemRecords);
        } else {
            http_response_code(404);
            echo json_encode(
                array("message" => "No item found.")
            );
        }
    }
    public function api_edit_q819191ja8qo($id) {
        $data['id_q'] = md5($_POST['id_quest']);
        if ($id == $data['id_q']) {
            if ($this->model('Apis_model')->editDataQuestions($_POST) > 0) {
                $json = json_encode($_POST);
                if ($json) {
                    echo "['ITEMS']:".$json;
                } else {
                    echo "Not Data Edit";
                }
            } else {
                echo "Not Data";
            }
        } else {
            echo "Not Data Akses";
        }
    }
    public function edit() {
        $data['roles'] = "10";
        if ($data['roles']) {
            if ($this->model('Apis_model')->editDataTasks($_POST) > 0) {
                $json = json_encode($_POST);
                if ($json) {
                    echo "[Successfuly] : " .$json;
                } else {
                    echo "Not Data Edit";
                }
            } else {
                echo "Not Data";
            }
        } else {
            echo "Not Data";
        }
    }
    public function deletes($id) {

        $exv = explode("=", $id);
        $cs = explode("mds_delete_id", $exv[0]);
        $exps = base64_decode($exv[1]);
        $id_tasks = $cs[1];

        if ($this->model('Apis_model')->hapusDataTasks($id_tasks) > 0 && $this->model('Apis_model')->hapusDataQuest($exps) > 0) {
            $json = json_encode($id_tasks);
            if ($json) {
                echo "[Delete Successfuly]";
            } else {
                echo "Not Data Edit";
            }
        } else {
            echo "Not Data";
        }
    }
    public function delete_ans($id) {

        $exv = explode("mdh_id=", $id);
        $exps = $exv[1];
        $id_tasks = $exps;

        if ($this->model('Apis_model')->hapusDataAnswers($exps) > 0) {
            $json = json_encode($id_tasks);
            if ($json) {
                echo "[Delete Successfuly]";
            } else {
                echo "Not Data Edit";
            }
        } else {
            echo "Not Data";
        }
    }
    public function deletes_questions_13hajq619($id) {
        $cs = explode("md_id=", $id);
        $id_tasks = $cs[1];

        if ($this->model('Apis_model')->hapusDataQuestions($id_tasks) > 0) {
            $json = json_encode($id_tasks);
            if ($json) {
                echo "[Delete Successfuly]";
            } else {
                echo "Not Data Edit";
            }
        } else {
            echo "Not Data";
        }
    }
    public function banned($id) {
        $cs = explode("mds_id=", $id);
        $id_tasks = $cs[1];
        if ($id_tasks) {
            $datas['yu'] = $this->model('Apis_model')->gettingUsersById($id_tasks);
        }
        $keys = $datas['yu']['token'];
        $data['token_id'] = $datas['yu']['token']."_".$datas['yu']['usern'];
        if ($this->model('Apis_model')->succBand($data) > 0) {
            $this->model('Apis_model')->bannedUsers($id_tasks);
            $this->model('Apis_model')->hapusDataCoinsID($keys);
            $this->model('Apis_model')->hapusDataRefferal($keys);
            $json = json_encode($id_tasks);
            if ($json) {
                echo "[Banned Successfuly]";
            } else {
                echo "Not Data Edit";
            }
        } else {
            echo "Not Data Ban";
        }
    }
    public function apisearch_18jskqojK($id) {
        $resultSearch['users'] = $this->model('Apis_model')->searchUsers($id);
        $usr = "ORDER-FB@YUNMECAVEN=007";
        $token = $usr;
        if ($resultSearch && $usr == $usr && $token) {
            $itemRecords = array();
            $itemRecords[$usr] = array();
            foreach ($resultSearch['users'] as $item) {
                extract($item);
                $itemDetails = array(
                    "id_users" => $id_users,
                    "nama" => $nama,
                    "usern" => $usern,
                    "email" => $email,
                    "verify" => $verify,
                    "token" => $token,
                    "dates" => $dates
                );
                array_push($itemRecords[$usr], $itemDetails);
            }
            http_response_code(200);
            echo json_encode($itemRecords);
        } else {
            http_response_code(404);
            echo json_encode(
                array("message" => "No item found.")
            );
        }
    }
    public function apisearch_5753a18jskqojK($id) {
        $resultSearch['users'] = $this->model('Apis_model')->searchBanned($id);
        $usr = "ORDER-FB@YUNMECAVEN=006";
        $token = $usr;
        if ($resultSearch && $usr == $usr && $token) {
            $itemRecords = array();
            $itemRecords[$usr] = array();
            foreach ($resultSearch['users'] as $item) {
                extract($item);
                $itemDetails = array(
                    "id_succ" => $id_succ,
                    "token_sce" => $token_sce,
                    "statussce" => $statussce,
                    "tokensce" => $tokensce,
                    "dateat" => $dateat
                );
                array_push($itemRecords[$usr], $itemDetails);
            }
            http_response_code(200);
            echo json_encode($itemRecords);
        } else {
            http_response_code(404);
            echo json_encode(
                array("message" => "No item found.")
            );
        }
    }
    public function readapis_tok90u53w57hj853($id) {
        $resultlo['poo'] = $this->model('Apis_model')->getdataSimples($id);
        $usr = "861961667767";
        $token = md5($usr);
        if ($resultlo && $usr == $usr && $token) {
            $itemRecords = array();
            $itemRecords[$token] = array();
            foreach ($resultlo['poo'] as $item) {
                extract($item);
                $itemDetails = array(
                    "idsov" => $idsov,
                    "answersscv" => $answersscv,
                    "linkscc" => $linkscc,
                    "tokenscn" => $tokenscn
                );
                array_push($itemRecords[$token], $itemDetails);
            }
            http_response_code(200);
            echo json_encode($itemRecords);
        } else {
            http_response_code(404);
            echo json_encode(
                array("message" => "No item found.")
            );
        }
    }

    public function api_a61673ksi3j9281($id) {

        $tokens = "yunmecoins_apis=2f79eaa1-280424-cb143b407";
        $exp = explode("=", $id);
        $esc = explode("-", $exp[1]);
        $ecs = explode("=", $tokens);


        if ($exp[1] == $ecs[1] && $esc[1] == "280424" && $esc[0] == "2f79eaa1") {
            $resultiy = $this->model('Apis_model')->getAllDataPayOut();
            $usr = "ORDER-FB@YUNMECAVEN=019";
            $token = $usr;
            if ($resultiy && $usr == $usr && $token) {
                $itemRecords = array();
                $itemRecords[$usr] = array();
                foreach ($resultiy as $items) {
                    extract($items);
                    $itemDetails = array(
                        "name" => $name,
                        "email" => $email,
                        "number_phone" => $number_phone,
                        "yu_too" => $yu_too,
                        "credits" => $credits,
                        "cooins" => $cooins,
                        "roles_pay" => $roles_pay,
                        "dates" => $dates
                    );
                    array_push($itemRecords[$usr], $itemDetails);
                }
                http_response_code(200);
                echo json_encode($itemRecords);
            } else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No item found.")
                );
            }

        } else {
            header("Location: ".BASEURL);
        }
    }
    public function successTransactions($id) {
        $eplac = explode("hmla=", $id);
        if ($this->model('Apis_model')->updatesSuccessCoins($eplac[1]) > 0) {
            $json = json_encode($eplac[1]);
            if ($json) {
                echo "[Update Successfuly]";
            } else {
                echo "Not Data Edit";
            }
        } else {
            echo "Not Data";
        }
    }
}