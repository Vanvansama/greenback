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
        $admin = Db::table('user')->where([['username', '=', $userName],['password', '=', $password]])->find();
        if ($admin != null) {
            $data = ['status' => 'success', 'id' => $admin['id'], 'username' => $admin['username'], 'sex' => $admin['sex'], 'phone' => $admin['phone'], 'create_date' => date("Y-m-d H:i:s")];
            $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        } else {
            $data = ['status' => 'failed'];
            $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        }
        return json($res);
        
    }
}