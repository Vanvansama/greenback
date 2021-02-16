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
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('hello/:name', 'index/hello');

Route::post('admin/login', 'admin/login');

Route::get('suggestion', 'suggestion/index');

Route::get('openId', 'index/openId');

Route::get('user/:userId', 'user/index');

Route::get('records/:userId', 'record/index');

Route::put('bike/:userId', 'bike/index');

Route::get('reports', 'report/index');
Route::put('reports/:reportId', 'report/update');
