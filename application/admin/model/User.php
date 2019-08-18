<?php

namespace app\admin\model;

use think\model\concern\SoftDelete;

class User extends \app\common\model\User
{
    use SoftDelete;

    public function isLogin()
    {
        return session('?user');
    }

    public function logout()
    {
        if ($this->isLogin())
        {
            session('user', null);
        }
    }

    public function formatPassword($password)
    {
        return md5($password);
    }

    public function getId()
    {
        return session('user.id');
    }

    /**
     * @param $username
     * @param $password
     * @throws \Exception
     */
    public function login($username, $password)
    {
        $userValidate = new \app\admin\validate\User();
        $isLoginDataAright = $userValidate->scene('login')->check([
            'username'  => $username,
            'password'  => $password
        ]);
        if (false == $isLoginDataAright) { throw new \Exception($userValidate->getError(), 1);}

        $user = $this->verifier($username, $password);
        if(false ==  $user) { throw new \Exception('用户名或密码错误');}
        session('user', [
            'id'        => $user->id,
            'username'  => $user->username,
        ]);
    }

    public function getInfo()
    {
        $user = $this->find(session('id'));
        return [
            'id'        => $user->id,
            'username'  => $user->username,
        ];
    }

    private function verifier($username, $password)
    {
        $user = $this->where('username', $username)->find();
        if(isset($user) && $user->password === $this->formatPassword($password)) return $user;
        return false;
    }
}
