<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;

class Suggestion extends BaseController
{
    public function index()
    {
        $data = Db::name('suggestion')->select();
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }

    public function add($suggestion,$openId)
    {
        $data = [];
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        Db::name('suggestion')
            ->save(['detail' => $suggestion,'userId' => $openId]);
        return json($res);
    }
}