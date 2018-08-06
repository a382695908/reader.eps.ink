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

// 注册 && 登录 && 退出
Route::get('/login', 'auth/login_view');
Route::get('/register', 'auth/register_view');
Route::post('/login', 'auth/login');
Route::post('/register', 'auth/register');
Route::post('/logout', 'auth/logout');

// 分类页面
Route::get('/category/:cid', 'category/index');
Route::get('/category/:cid/page/:page', 'category/index');

// 全本页面
Route::get('/full', 'category/isend');
Route::get('/full/page/:page', 'category/isend');

// 小说页面
Route::get('/novel/:id', 'novel/index');
Route::get('/novel/search', 'novel/search');
Route::post('/novel/recommend', 'novel/recommend');

// 小说章节阅读界面
Route::get('/chapter/:id', 'chapter/index');

// 排行榜
Route::get('/top', 'top/index');

// 我的书架
Route::get('/bookcase', 'bookcase/index');
Route::post('/bookcase/add', 'bookcase/add');
Route::post('/bookcase/delete', 'bookcase/delete');

// 访问网站
Route::post('/visitor_log', 'visit/visitor_log');


return [

];
