<?php
	namespace Home\Controller;
	use Think\Controller;

	class UserController extends Controller {
		protected $userType = 'user';
		protected $userInfo;
		protected $model;
		protected $res = array();
		protected $ajax = false;

		// 初始化用户model
		function __construct() {
			$this->model = new Home\Model\UserModel;
		}

		// 内部调用only
		protected function getLoginStatus() {

		}

		protected function setLoginStatus() {

		}

		// 登陆
		public function login()
		{
			$data = $this->model->create();
			if($data && isset($data['username']) && isset($data['password'])) {
				$info = $this->model->getList(array('username' => $data['username']));
				## code
			}
		}

		public function loginOut() {

		}

		// 注册
		public function reg() {
			$info = $this->model->add();
		}

		// 修改信息
		public function change() {
			$info = this->model->update();
		}

		// 进入最后逻辑
		function __contruct() {

		}
	}