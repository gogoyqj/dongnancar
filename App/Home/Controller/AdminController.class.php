<?php
	namespace Home\Controller;

	class AdminController extends UserController {
		protected $adminModel;
		protected $userModel;
		protected $cateModel;
		protected $subsModel;

		function __construct() {
			parent::__construct();
			if(!$this->userInfo && $this->page != 'login') {
				$this->redirect('/Home/Admin/login/');
			} else {
				$this->adminModel = new \Home\Model\AdminModel;
				$this->cateModel  = new \Home\Model\CatesModel;
				$this->subsModel  = new \Home\Model\SubsModel;
			}
		}

		// 登陆
		public function login()
		{

			if(!$this->adminModel->autoCheckToken($_POST)) {
				$this->onError(900);
			} else {
				$data = $this->adminModel->field('username,password')->create();
				// var_dump($data);
				// var_dump($this->adminModel->error);
				if(!isset($_POST['username'])) {
					$this->onError(100);
				} else if(!isset($_POST['password'])) {
					$this->onError(110);
				}
			}
		}

		public function index()
		{
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
		public function addCate()
		{
			# code...
		}

		public function changeCate()
		{
			# code...
		}

		public function deleteCate()
		{
			# code...
		}

		public function sortCate() 
		{

		}


		// 进入最后逻辑
		function __destruct() {
			parent::__destruct();
		}
	} 