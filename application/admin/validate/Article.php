<?php

namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'title|标题'  => 'require',
        'c_id|分类'   => 'require|token',
    ];

    public function sceneTitleLength()
    {
        return $this->only(['title'])->append('title', 'max:80');
	}

    public function sceneTitleUnique()
    {
        return $this->only(['title'])->append('title', 'unique:article');
	}

}
