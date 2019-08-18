<?php

namespace app\admin\validate;

use think\Validate;

class User extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'username|用户名'  => 'require|min:5',
        'password|密码'    => 'require|min:5',
    ];

    public function sceneLogin()
    {
        return $this->only(['username', 'password']);
	}
}
