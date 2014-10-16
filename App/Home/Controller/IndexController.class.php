<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

	public function _empty() {
		$this -> index();
	}

    public function index(){
    }

    public function sub() {
    }
    
    function __destruct() {
        $this -> assign("static_dir", C("STATIC_DIR"));
        $this -> display();
    }
}