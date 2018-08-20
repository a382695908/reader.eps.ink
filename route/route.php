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
Route::get('/login', 'Auth/login_view');
Route::get('/register', 'Auth/register_view');
Route::post('/login', 'Auth/login');
Route::post('/register', 'Auth/register');
Route::post('/logout', 'Auth/logout');

// 分类页面
Route::get('/category/:cid', 'Category/index');
Route::get('/category/:cid/page/:page', 'Category/index');

// 全本页面
Route::get('/full', 'Category/isend');
Route::get('/full/page/:page', 'Category/isend');

// 小说页面
Route::get('/novel/:id', 'Novel/index');
Route::get('/novel/search', 'Novel/search');
Route::post('/novel/recommend', 'Novel/recommend');

// 小说章节阅读界面
Route::get('/chapter/:id', 'Chapter/index');

// 排行榜
Route::get('/top', 'Top/index');

// 我的书架
Route::get('/bookcase', 'Bookcase/index');
Route::post('/bookcase/add', 'Bookcase/add');
Route::post('/bookcase/delete', 'Bookcase/delete');

// 访问网站
Route::get('/ds', 'test/ds');

// 反馈
Route::post('/advise', 'FeedBack/advise');
Route::post('/report', 'FeedBack/report');
Route::post('/sponsor', 'FeedBack/sponsor');


return [

];
