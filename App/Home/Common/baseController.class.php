<?php
namespace Home\Common;
use Think\Controller;
class BaseController extends Controller {
	protected $ajax = false;// 是否输出ajax
	protected $res = array();// 数据数组
	protected $page = ACTION_NAME;// action name
	protected $isPost = IS_POST;//is post
	protected $errorNum = 0;
	protected $redirectUrl = '';
	function __contruct() 
	{
		parent::__contruct();
	}

	public function assign($key='', $value='')
	{
		if($key) {
			$this->res[$key] = $value;
			parent::assign($key, $value);
		}
	}

	// 跳转到首页
	public function _empty()
	{
		if($this->ajax) {
			$this->onError(404);
		} else {
			redirect(U('/Home/index'));
		}
	}

	public function onError($code='')
	{
		$this->errorNum = $code;
	}

	function __destruct() 
	{
		if($this->errorNum) {
			$err = C('error');
			$this->assign('error', isset($err[$this->errorNum]) ? $err[$this->errorNum] : $err['default']);
		}
		$this->assign('errorNum', $this->errorNum);
		$this->assign('brand', C('brand'));
		$this->assign('company', C('company'));
		$this->assign('year', date('Y'));
		$this->assign('page', $this->page);
		if($this->ajax) {
			$this->ajaxReturn($this->res);
		} else {
			$this->assign("static_dir", C("STATIC_DIR"));
    		$this-> display();
		}
	}
}