<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;


class User extends BaseController
{
    
    public function index($userId)
    {
        $user = Db::table('user')->whereOr([['id', '=', $userId],['username', 'like', $userId]])->find();
        $data = $user;
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }

    public function updateMoney($userId, $money)
    {
        $user = Db::table('user')->where('id', $userId)->find();
        Db::name('user')
            ->where('id', $userId)
            ->update(['amout' => ($user['amout'] + $money)]);
        $data = $user;
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}