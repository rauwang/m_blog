<?php

namespace app\admin\controller;

use think\Controller;

class Common extends Controller
{

    protected $user;

    protected function initialize()
    {
        $user = model('User');
        if (false == $user->isLogin()) {
            $this->error('请登录...', '/admin/login');
        }
        $this->user = $user->getInfo();
        $this->navsManager();
    }

    protected function setTitle($title) {
        $this->assign('title', $title);
        $this->assign('activeTab', $title);
    }

    private function navsManager()
    {
        $this->assign('navs', [
            '文章管理'  => [
                [
                    '文章列表'  => url('/admin/article_list'),
                    '添加文章'  => url('/admin/article_add'),
                ],
            ],
            '分类管理'  => [
                [
                    '文章分类'  => url('/admin/category_list'),
                    '增加分类'  => url('/admin/category_add'),
                ],
            ],
            '系统管理'  => [
                [
                    '导航设置'  => '#',
                    '个人介绍'  => '#',
                ]
            ],
        ]);
    }
}
