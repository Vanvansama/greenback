<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;

class Admin extends BaseController
{
    public function login($userName, $password)
    {
        // TODO
        // 新建了一张admin表 查那里的
        $data = [];
        $admin = Db::table('user')->where('username', $userName)->find();
        if ($admin != null) {
            $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
            return json($res);
        }
        
    }
}