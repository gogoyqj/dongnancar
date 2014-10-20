<?php
namespace Home\Controller;

class IndexController extends \Home\Common\BaseController {

    function __contruct() {
        parent::__construct();
    }

	public function _empty() {
		$this -> index();
	}

    public function index(){
    }

    public function sub() {
    }
    
    function __destruct() {
        parent::__destruct();
    }
}