<?php
	namespace Home\Controller;

	class UserController extends \Home\Common\BaseController {
		protected $userInfo = false;
		protected $userData = false;
		protected $userModel;
		protected $pwdCookie;
		protected $infoCookie;
		protected $usertype = 'user';
		protected $redirectUrl = './';
		protected $infoModel;

		// 初始化用户model
		function __construct() {
			parent::__construct();
			$this->pwdCookie = C('PWDCOOKIE');
			$this->infoCookie = C('INFOCOOKIE');
			$this->initUser();
			if(I('post.ajax') || I('get.ajax')) $this->ajax = true;
			$this->userModel = new \Home\Model\UserModel;
		}

		// 登陆
		public function login($oa='')
		{
			if(I('post.oa')) $oa = I('post.oa');
			$remember = I('post.remember');
			$this->assign('oa', $oa);
			if($this->isPost) {
				$this->before_login();
				if(!$this->infoModel->autoCheckToken($_POST)) {
					$this->onError(900);
				} else {
					if(!$this->checkUser(array(
						'username' => I('post.username'),
						'password' => I('post.password')
					))) {
						$this->setLoginStatus($this->userInfo, $remember);
						redirect(U('Home/Admin/' . ($oa ? $oa : 'index')));
					}
				}
			}
		}

		protected function checkUser($info=false) {
			if(!$info) {
				$info = $this->userInfo;
			} else {
				$info['password'] = md5($info['password']);
			}
			$username = $info['username'];
			$password = $info['password'];
			$u = $this->infoModel->getValidate('username');
			if(!preg_match($u[1], $username)) {
				$this->onError(100);
			} else if(!trim($password)) {
				$this->onError(110);
			} else {
				$list = $this->infoModel->getList(array(
					'username' => $username
				));
				if($list && isset($list[0])) {
					if($password === $list[0]['password']) {
						$this->onError(0);
						if(!$this->userInfo) {
							$this->userInfo = array(
								'username' => $username,
								'password' => $password,
								'usertype' => $this->usertype
							);
						}
						$this->userData = $list[0];
					} else {
						// 密码不匹配
						$this->onError(111);
					}
				} else {
					// 用户不存在
					$this->onError(101);
				}
			}
			return $this->errorNum;
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
				if(count($__cake) >= 3 && $pwdmd5 && $pwdmd5 == $__cake[2]) {
					$this->userInfo = array(
						'username' => $__cake[0],
						'usertype' => $__cake[1],
						'password' => $pwdmd5,
					);
				}
			}
			return $this->userInfo;
		}

		protected function setLoginStatus($data='', $remember=false)
		{
			$expire = '';
			if($remember) $expire = 'expire=604800&'; 
			if($data && isset($data['username']) && isset($data['password'])) {
				$info = base64_encode($data['username'] . '+' . $this->usertype . '+' . $data['password']);
				cookie($this->pwdCookie, $data['password'], $expire . 'path=/');
				cookie($this->infoCookie, $info, $expire . 'path=/');
			}
		}

		public function index()
		{
			
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