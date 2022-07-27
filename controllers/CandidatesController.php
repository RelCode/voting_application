<?php
require_once('./library/Controller.php');
class CandidatesController extends Library\Controller {
    public function __construct(){
        $this->candidatesModel= $this->model('candidates');
        $this->subpage = isset($_GET['subpage']) ? $_GET['subpage'] : 'view';
    }

    public function index(){
        $count = $this->candidatesModel->allRowCount('candidates');//pass the the table name
        if(!in_array($this->subpage,['view','read'])){//if voter tempers with subpage URI, reset to view as default
            $this->subpage = 'view';
        }
        if($this->subpage == 'read'){
            $id = isset($_GET['candidate']) ? htmlentities($_GET['candidate'],ENT_QUOTES) : '';
            $data = $this->candidatesModel->singleWhereIdRow('candidates','id',$id);
            if(!empty($data)){
                $data['candidacies'] = $this->candidatesModel->candidacyAreas($id);
            }
        }else{
            $data = $this->candidatesModel->getCandidates();
        }
        // var_dump($data);
        return $this->view('candidates/'.$this->subpage,$data,$count);
    }
}