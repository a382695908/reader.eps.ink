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
Route::get('/login', '@home/auth/login_view');
Route::get('/register', '@home/auth/register_view');
Route::post('/login', '@home/auth/login');
Route::post('/register', '@home/auth/register');
Route::post('/logout', '@home/auth/logout');

// 分类页面
Route::get('/category/:cid', '@home/category/index');
Route::get('/category/:cid/page/:page', '@home/category/index');
// 全本页面
Route::get('/full', '@home/category/isend');
Route::get('/full/page/:page', '@home/category/isend');

// 小说页面
Route::get('/novel/:id', '@home/novel/index');
Route::get('/novel/search', '@home/novel/search');
Route::post('/novel/recommend', '@home/novel/recommend');

// 小说章节阅读界面
Route::get('/chapter/:id', '@home/chapter/index');

// 排行榜
Route::get('/top', '@home/top/index');

// 我的书架
Route::get('/bookcase', '@home/bookcase/index');
Route::post('/bookcase/add', '@home/bookcase/add');
Route::post('/bookcase/delete', '@home/bookcase/delete');

// 反馈
Route::post('/advise', '@home/feedBack/advise');
Route::post('/report', '@home/feedBack/report');
Route::post('/sponsor', '@home/feedBack/sponsor');


// ---- 后台 ----
Route::post('/admin/api/login', '@admin/auth/login');
Route::get('/admin/api/novels', '@admin/novel/novels');
Route::get('/admin/api/novel', '@admin/novel/novel');



return [

];
