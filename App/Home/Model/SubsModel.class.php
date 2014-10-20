<?php
	namespace Home\Model;
	use Think\Model;
	class SubsModel extends CatesModel {
		protected $_validate = array(
			array('en', '/[a-zA-Z]+/', '英文名称格式错误'),
			array('title', 'require', '名字不能为空', 1),
			array('id', 'number', '无效id'),
			array('cateid', 'number', '无效分类id', 1),
			array('author', 'require', '操作者不能为空', 1),
			array('rank', 'number', '排序位置错误'),
			array('state', 'number', '无效状态'),
		);

		protected $tableName = 'subs';

		function __construct() {
			parent::__construct();
		}
	}