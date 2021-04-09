<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;


class User extends BaseController
{
    
    public function index($userId)
    {
        // $data = ['sex' => 'male', 'phone' => '13192280000', 'college' => '信息与技术学院', 'amount' => '5.2'];
        $user = Db::table('user')->where('id', $userId)->find();
        var_dump($userId, $user);
        $data = $user;
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}