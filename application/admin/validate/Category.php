<?php

namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'name|分类名称' => 'require|token'
    ];

    public function sceneNameLength()
    {
        return $this->only(['name'])->append('name', 'max:15');
	}

    public function sceneNameUnique()
    {
        return $this->only(['name'])->remove('name', 'token')->append('name', 'unique:category');
	}
}
