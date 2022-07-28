<?php
require_once('./library/Controller.php');
class VoteController extends Library\Controller {
    public function __construct(){
        $this->voteModel = $this->model('vote');
        $this->subpage = isset($_GET['subpage']) ? $_GET['subpage'] : 'view';
    }

    public function index(){
        $data = [];
        if(!in_array($this->subpage,['view','cast'])){
            $this->subpage = 'view';
        }
        if($this->subpage == 'cast'){
            $for = isset($_GET['for']) ? $_GET['for'] : '';
            if($for != ''){
                $data = $this->voteModel->allCandidates($for);
                if(!empty($data)){
                    $data[count($data) + 1] = $this->voteModel->allWhereRowEqual('votes','voter',$_SESSION['voter']['id_number'],'candidacy',$for);
                }
            }else{
                $this->subpage = 'view';
            }
        }
        // var_dump($_SESSION['voter']);
        // var_dump($data);
        return $this->view('vote/'.$this->subpage,$data);
    }
}