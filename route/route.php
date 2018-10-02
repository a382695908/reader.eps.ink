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
// 登录 & 退出
Route::post('/admin/api/login', '@admin/admin/login');
Route::post('/admin/api/logout', '@admin/admin/logout');

// 作者
Route::get('/admin/api/authors', '@admin/author/authors');
Route::get('/admin/api/author', '@admin/author/author');
Route::get('/admin/api/author_name_suggestion', '@admin/author/author_name_suggestion');
Route::post('/admin/api/edit_author', '@admin/author/edit_author');
Route::get('/admin/api/check_author_name', '@admin/author/check_author_name');
Route::post('/admin/api/add_author', '@admin/author/add_author');

// 分类
Route::get('/admin/api/categorys', '@admin/category/categorys');
Route::get('/admin/api/category', '@admin/category/category');
Route::post('/admin/api/category/edit', '@admin/category/edit_category');
Route::post('/admin/api/category/add', '@admin/category/add_category');

// 小说
Route::get('/admin/api/novels', '@admin/novel/novels');
Route::get('/admin/api/novel', '@admin/novel/novel');
Route::post('/admin/api/novel/edit', '@admin/novel/edit_novel');
Route::post('/admin/api/novel/add', '@admin/novel/add_novel');
// 小说章节组
Route::get('/admin/api/novel/chapter_groups', '@admin/chapter/chapter_groups');
Route::get('/admin/api/novel/chapter_group', '@admin/chapter_group/chapter_group');
Route::post('/admin/api/novel/chapter_group/edit', '@admin/chapter_group/edit_chapter_group');
Route::post('/admin/api/novel/chapter_group/add', '@admin/chapter_group/add_chapter_group');
// 小说章节
Route::get('/admin/api/novel/chapters', '@admin/chapter/chapters');
Route::get('/admin/api/novel/chapter', '@admin/chapter/chapter');
Route::post('/admin/api/novel/chapter/edit', '@admin/chapter/edit_chapter');
Route::post('/admin/api/novel/chapter/add', '@admin/chapter/add_chapter');


return [

];
