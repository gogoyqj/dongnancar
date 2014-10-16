<?php
	namespace Home\Model;
	use Think\Model;
	class UserModel extends CatesModel {
		protected $tableName = 'user';
		protected $_validate = array(
			//array(验证字段2,验证规则,错误提示,[验证条件,附加规则,验证时间]),
			array('verify','require','请输入验证码！'),
			array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
			array('username', '/[a-zA-Z0-9_@\.]+/', '英文名称格式错误', 1),
			array('password', '/[\s]{6,}/', '密码格式错误', 1),
			array('grade', 'number', '用户等级格式错误'),
			array('sex', 'number', '用户性别格式错误'),
			array('age', 'number', '用户年龄格式错误'),
			array('mobile', '/1[0-9]{10}/', '用户手机格式错误'),
			array('number', '/([0-9]{3})?(-)?[0-9]{8}/', '用户年龄格式错误'),
			// array('address', '', '用户地址格式错误'),
			array('email', 'email', '用户邮箱格式错误'),
			array('rights', 'number', '用户权限格式错误'),
		);
	}
