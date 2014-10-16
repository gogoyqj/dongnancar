<?php
	namespace Home\Controller;
	use Think\Controller;

	class UserController extends UserController {
		protected $userType = 'admin';
		protected $adminModel;
		protected $userModel;
		protected $cateModel;
		protected $subsModel;

		function __construct() {

			if($this->getLoginStatus() !== 'admin') {
				return $this->LoginPage();
			}

			$this->adminModel = new Home\Model\AdminModel;
			$this->userModel  = new Home\Model\UserModel;
			$this->cateModel  = new Home\Model\CatesModel;
			$this->subsModel  = new Home\Model\subsModel;
		}

		public function index()
		{
			
		}

		### 操作用户
		public function addUser() {
		}

		public function changeUser() {
		}

		public function deleteUser() {

		}

		### 操作管理员
		public function addAdmin() {

		}

		public function changeAdmin() {

		}

		public function deleleAdmin() {

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

		public function sortCate() {

		}


		// 进入最后逻辑
		function __contruct() {

		}
	} 