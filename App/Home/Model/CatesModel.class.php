<?php
	namespace Home\Model;
	use Think\Model;
	class CatesModel extends Model {
		protected $_validate = array(
			array("en", "/[a-zA-Z]+/", "英文名称格式错误"),
			array('title', 'require', '名字不能为空', 1),
			array('id', 'number', '无效id'),
			array('state', 'number', '无效状态'),
			array('link', 'url', '无效链接地址'),
		);

		public function getList($map = array()) {
			return $this->where($map)->select();
		}

		public function add($data='', $cmd='add')
		{
			$err = array('msg' => '无效数据');
			if($data) {
				if(!!$this->create($data)) {
					if($cmd == 'update' || isset($data['id'])) {
						return $this->where('id=' . $data['id'])->save($data);
					} else {
						return parent::add($data);
					}
				} else {
					if($this->error) {
						$err['msg'] = $this->error;
					} else {
						$err['msg'] = '操作失败';
					}
				}
			}
			return $err;
		}

		public function update($data='')
		{
			return parent::add($data, 'update');
		}

		public function delete($map='')
		{
			$id = is_array($map) && isset($map['id']) ? $map['id'] : $map;
			if($id === '*') {
				return '操作失败';
			} else {
				return parent::delete($id);
			}
		}

		public function deleteAll()
		{
			return parent::where("1")->delete();
		}

	}
