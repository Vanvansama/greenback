<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;

class Admin extends BaseController
{
    public function login($userName, $password)
    {
        $data = [];
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        $admin = Db::table('user')->where('username', 'root')->find();
        return json($res);
    }
}