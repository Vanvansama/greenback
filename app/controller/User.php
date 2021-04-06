<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;


class User extends BaseController
{
    // TODO
    // openId 是带有 - 的 好像会进行截取 前端传的是 /user/oUd-C4vrBb1NPTLn0FjotHyZ8dCk
    // 但是sql的log是
    // SELECT * FROM `user` WHERE  `id` = 'oUd' LIMIT 1 [ RunTime:0.000425s ]
    public function index($userId)
    {
        // $data = ['sex' => 'male', 'phone' => '13192280000', 'college' => '信息与技术学院', 'amount' => '5.2'];
        $user = Db::table('user')->where('id', $userId)->find();
        $data = $user;
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}