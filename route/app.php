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
Route::post('suggestion', 'suggestion/add');

Route::get('openId', 'index/openId');

Route::post('user/', 'user/index');

Route::post('records', 'record/index');

Route::put('bike/:bikeId', 'bike/update');
Route::get('/api/bikes', 'bike/index');

Route::get('reports', 'report/index');
Route::put('reports/:reportId', 'report/update');
Route::post('report', 'report/save');

Route::post('exception', 'exception/save');
Route::get('returns', 'exception/index');
Route::put('returns/:exceptionId', 'exception/update');