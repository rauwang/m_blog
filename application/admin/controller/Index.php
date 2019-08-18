<?php

namespace app\admin\controller;

// 后台首页
// 先判断是否登陆
// 若没有登陆，则跳转到登陆页

class Index extends Common
{
    public function index()
    {
        $this->assign('title', '后台首页');
        return view();
    }
}
