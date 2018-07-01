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

Route::get('auth', 'auth/index');
Route::post('login', 'auth/login');
Route::post('register', 'auth/register');
Route::post('logout', 'auth/logout');

Route::get('category/:cid', 'category/index');

Route::get('xs/:id', 'xs/index');

Route::get('character/:id', 'character/index');

Route::get('bookcase', 'bookcase/index');
Route::post('bookcase/add/:id', 'bookcase/delete');
Route::post('bookcase/delete/:id', 'bookcase/delete');

return [

];
