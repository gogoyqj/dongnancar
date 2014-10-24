<?php
	namespace Home\Controller;

	class AdminController extends UserController {
		protected $adminModel;
		protected $userModel;
		protected $cateModel;
		protected $subsModel;
		protected $usertype = 'admin';
		protected $menu;

		function __construct() {
			parent::__construct();
			if(!$this->userInfo && $this->page != 'login') {
				redirect(U('/Home/Admin/login', array('oa' => $this->page)));
			} else {
				$this->adminModel = new \Home\Model\AdminModel;
				$this->cateModel  = new \Home\Model\CatesModel;
				$this->subsModel  = new \Home\Model\SubsModel;
				$this->menu = C('CFG');
			}
		}

		protected function before_login()
		{
			$this->infoModel = $this->adminModel;
		}

		public function index()
		{
			$this->before_login();
			// 除了检测cookie，还需要重新验证
			if($this->checkUser()) {
				redirect(U('/Home/Admin/login'));
			} else {
				$this->assign('user', $this->userInfo);
				$this->assign('editUrl', U('/Home/Admin/edit/type/' . $this->usertype, array(
					'username' => $this->userInfo['username'],
				)));
				$this->assign('menu', json_encode($this->menu));
			}
		}

		### 操作用户
		public function addUser() 
		{
		}

		public function changeUser() 
		{
		}

		public function deleteUser() 
		{

		}

		### 操作管理员
		public function addAdmin() 
		{

		}

		public function changeAdmin() 
		{

		}

		public function deleleAdmin() 
		{

		}

		### 操作导航条
		public function addCates()
		{
			# code...
		}

		public function changeCates()
		{
			# code...
		}

		public function deleteCates()
		{
			# code...
		}

		public function sortCates() 
		{

		}


		// 进入最后逻辑
		function __destruct() {
			parent::__destruct();
		}
	} 