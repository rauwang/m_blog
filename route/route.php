<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

\think\facade\Route::group('', function () {
    \think\facade\Route::get('/', 'home/Index/index');
    \think\facade\Route::get('/article/[:id]', 'home/Index/article');
});

\think\facade\Route::group('admin', function () {
    \think\facade\Route::get('/', 'admin/Index/index');
    // 登陆、退出
    \think\facade\Route::rule('/login', 'admin/Login/index', 'get|post');
    \think\facade\Route::get('/logout', 'admin/Login/logout');
    // 文章
    \think\facade\Route::get('/article_list', 'admin/Article/table');
    \think\facade\Route::rule('/article_add', 'admin/Article/add', 'get|post');
    \think\facade\Route::rule('/article_edit/[:id]', 'admin/Article/edit', 'get|post');
    \think\facade\Route::get('/article_del/:id', 'admin/Article/del');
    // 标签分类
    \think\facade\Route::get('/category_list', 'admin/Category/table');
    \think\facade\Route::rule('/category_add', 'admin/Category/add', 'get|post');
    \think\facade\Route::rule('/category_edit/[:id]', 'admin/Category/edit', 'get|post');
    \think\facade\Route::get('/category_del/:id', 'admin/Category/del');
});
