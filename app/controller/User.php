<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;


class User extends BaseController
{
    
    public function index($userId)
    {
        $user = Db::table('user')->where('id', $userId)->find();
        // var_dump($userId, $user);
        $data = $user;
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}