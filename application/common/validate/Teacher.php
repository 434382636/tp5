<?php
namespace app\common\validate;
use think\Validate;

class Teacher extends Validate{
	 
    protected $rule = [
        'username' => 'require|length:4,12',
        'password' => 'require|length:2,25',
    ];

    protected $message = [
      'username.require' => '用户名不能为空！',
      'username.length' => '用户名长度为4到12位！',  
      'password.require' => '密码不能为空！',  
      'password.length' => '密码长度为2到12位！',  
    ]; 
}