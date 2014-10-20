<?php
	namespace Home\Controller;

	class UserController extends \Home\Common\BaseController {
		protected $userInfo = false;
		protected $userModel;
		protected $pwdCookie;
		protected $infoCookie;

		// 初始化用户model
		function __construct() {
			parent::__construct();
			$this->pwdCookie = C('PWDCOOKIE');
			$this->infoCookie = C('INFOCOOKIE');
			$this->initUser();
			$this->userModel = new \Home\Model\UserModel;
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

		public function setLoginStatus($data='')
		{
			# code...
			if($data && isset($data['username']) && isset($data['usertype']) && isset($data['password'])) {
				$info = base64_encode($data['username'] . '+' . $data['usertype'] . '+' . $data['password']);
				cookie($pwdCookie, $data['password'], array('expire'=>-1, 'path'=>'/'));
				cookie($infoCookie, $info, array('expire'=>-1, 'path'=>'/'));
			}
		}

		public function index()
		{
			# code...
		}

		// 登陆
		public function login()
		{
			$data = $this->userModel->getData();
			if($data && isset($data['username']) && isset($data['password'])) {
				$info = $this->userModel->getList(array('username' => $data['username']));
				## code
				$pwdmd5 = md5($data['password']);
				if(1) {

				}
			}
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

		public function loginPage()
		{
			# code...
		}


		// 进入最后逻辑
		function __destruct() {
			parent::__destruct();
		}
	}