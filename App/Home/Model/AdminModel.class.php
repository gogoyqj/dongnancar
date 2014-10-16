<?php
	namespace Home\Model;
	use Think\Model;
	class AdminModel extends CatesModel {
		protected $tableName = 'admin';
		protected $_validate = array(
			//验证条件 （可选）
			// 包含下面几种情况：
			// self::EXISTS_VALIDATE 或者0 存在字段就验证（默认）
			// self::MUST_VALIDATE 或者1 必须验证
			// self::VALUE_VALIDATE或者2 值不为空的时候验证
			//array(验证字段2,验证规则,错误提示,[验证条件,附加规则,验证时间]),
			array('verify','require','请输入验证码！'),
			array('username', '/[a-zA-Z0-9_@\.]+/', '英文名称格式错误', 1),
			array('name', 'require', '用户名字格式错误', 1),
			array('password', '/[\s]{6,}/', '密码格式错误', 1),
			array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
		);
	}
