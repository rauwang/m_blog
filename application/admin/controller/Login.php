<?php

namespace app\admin\controller;

use think\Controller;
use think\facade\Request;

class Login extends Controller
{
    public function index()
    {
        $user = model('User');
        if ($user->isLogin()) { $this->success('已经登陆', '/admin');}
        if (Request::isPost())
        {
            $ok = false;
            try
            {
                $user->login(
                    input('post.username'),
                    input('post.password')
                );
                $ok = true;
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            if ($ok) { $this->success('登陆成功', '/admin');}
        }
        return view();
    }

    public function logout()
    {
        model('User')->logout();
        $this->success('退出成功', '/admin/login');
    }
}
