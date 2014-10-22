<?php
	namespace Home\Controller;

	class AdminController extends UserController {
		protected $adminModel;
		protected $userModel;
		protected $cateModel;
		protected $subsModel;
		protected $usertype = 'admin';

		function __construct() {
			parent::__construct();
			if(!$this->userInfo && $this->page != 'login') {
				redirect('login');
			} else {
				$this->adminModel = new \Home\Model\AdminModel;
				$this->cateModel  = new \Home\Model\CatesModel;
				$this->subsModel  = new \Home\Model\SubsModel;
			}
		}

		protected function before_login()
		{
			$this->infoModel = $this->adminModel;
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