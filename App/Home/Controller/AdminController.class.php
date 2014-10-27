<?php
	namespace Home\Controller;

	class AdminController extends UserController {
		protected $adminModel;
		protected $userModel;
		protected $catesModel;
		protected $subsModel;
		protected $usertype = 'admin';
		protected $menu;
		protected $dict;
		protected $state;

		function __construct() {
			parent::__construct();
			if(I('post.ajax') || I('get.ajax')) $this->ajax = true;
			if(!$this->userInfo && $this->page != 'login') {
				if($this->ajax) {
					return $this->onError(1010);
				}
				redirect(U('/Home/Admin/login', array('oa' => $this->page)));
			} else {
				$this->adminModel = new \Home\Model\AdminModel;
				$this->catesModel  = new \Home\Model\CatesModel;
				$this->subsModel  = new \Home\Model\SubsModel;
				$this->menu = C('CFG');
				$this->dict = C('DICT');
				$this->state = C('STATE');
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
				$this->assign('ajaxUrl', U('/Home/Admin/'));
				$this->assign('menu', $this->menu);
				$this->assign('dict', $this->dict);
				$this->assign('state', $this->state);

				// get admin list
				$list = $this->adminModel->getList('1');
				$model = array(
					'adminModel' => $this->adminModel->getDbFields(),
					'userModel'  => $this->userModel->getDbFields(),
					'catesModel' =>  $this->catesModel->getDbFields(),
					'subsModel'  =>  $this->subsModel->getDbFields(),
				);
				$this->assign('allModel', $model);
			}
		}

		public function getList($type='admin', $id=false, $en=false)
		{
			if($this->userInfo) {
				$this->before_login();
				$this->checkUser();
				if($type) {
					$type = strtolower($type);
					switch ($type) {
						case 'user':
							$model = $this->userModel;
							break;
						case 'subs':
							$model = $this->subsModel;
							break;
						case 'cates':
							# code...
							$model = $this->catesModel;
							break;
						default:
							# code...
							$model = $this->adminModel;
							break;
					}
					$map = array();
					if($id !== false) $map['id'] = intval($id);
					if($en !== false) $map['en'] = htmlspecialchars($id);
					if($type === 'admin') {
						// 管理员处进行权限过滤
						$map['rights'] = array('lt', $this->userData['rights'], 'or');
					} else {
						if($id === false && $en === false) $map = 1;	
					}
					$this->assign('list', $model->getList($map));
				}
			}
		}

		public function ajax($type="", $action="")
		{
			$this->ajax=true;
			switch ($type) {
				case 'cates':
					# code...
					$data=$this->catesModel->create($_POST);
					var_dump($this->catesModel->getError());
					break;
				
				default:
					# code...
					break;
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