<?php
	namespace Home\Controller;

	class UserController extends \Home\Common\BaseController {
		protected $userInfo = false;
		protected $userModel;
		protected $pwdCookie;
		protected $infoCookie;
		protected $usertype = 'user';

		// 初始化用户model
		function __construct() {
			parent::__construct();
			$this->pwdCookie = C('PWDCOOKIE');
			$this->infoCookie = C('INFOCOOKIE');
			$this->initUser();
			$this->userModel = new \Home\Model\UserModel;
		}

		// 登陆
		public function login()
		{
			if($this->isPost) {
				$this->before_login();
				if(!$this->infoModel->autoCheckToken($_POST)) {
					$this->onError(900);
				} else {
					$u = $this->infoModel->getValidate('username');
					$p = $this->infoModel->getValidate('password');
					if(!isset($_POST['username']) || !preg_match($u[1], $_POST['username'])) {
						$this->onError(100);
					} else if(!isset($_POST['password']) || !preg_match($p[1], $_POST['password'])) {
						$this->onError(110);
					} else {
						$username = $_POST['username'];
						$password = $_POST['password'];
						$list = $this->infoModel->getList(array(
							'username' => $username
						));
						if($list && isset($list[0])) {
							$pwdmd5 = md5(trim($password), false);
							if($pwdmd5 === $list[0]['password']) {
								$this->setLoginStatus($list[0]);
							} else {
								// 密码不匹配
								$this->onError(111);
							}
						} else {
							// 用户不存在
							$this->onError(101);
						}
					}
				}
			}
		}

		// 内部调用only
		protected function initUser()
		{
			// username & usertype
			$__cake = I('cookie.' . $this->infoCookie);
			// password
			$pwdmd5 = I('cookie.' . $this->pwdCookie);
			if($__cake) {
				$__cake = explode('+', base64_decode($__cake));
				if(count($__cake) == 3 && $pwdmd5 && $pwdmd5 == $__cake[2]) {
					$this->userInfo = array(
						'username' => $__cake[0],
						'usertype' => $__cake[1],
						'password' => $pwdmd5,
					);
				}
			}
			return $this->userInfo;
		}

		protected function setLoginStatus($data='')
		{
			# code...
			if($data && isset($data['username']) && isset($data['password'])) {
				$info = base64_encode($data['username'] . '+' . $this->usertype . '+' . $data['password']);
				cookie($this->pwdCookie, md5($data['password']), 'path=/');
				cookie($this->infoCookie, $info, 'path=/');
			}
		}

		public function index()
		{
			# code...
		}

		protected function before_login()
		{
			$this->infoModel = $this->userModel;
		}

		public function loginOut() {
			cookie($pwdCookie, '', array('expire'=>-1, 'path'=>'/'));
			cookie($infoCookie, '', array('expire'=>-1, 'path'=>'/'));
		}

		// 注册
		public function reg() {
			$info = $this->userModel->add();
		}

		// 修改信息
		public function change() {
			$info = $this->userModel->update();
		}


		// 进入最后逻辑
		function __destruct() {
			parent::__destruct();
		}
	}