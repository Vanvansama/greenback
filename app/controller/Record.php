<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;

class Record extends BaseController
{
    public function index($userId)
    {
        $data = Db::table('record')
            ->where('userId', $userId)
            ->select();
        
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }

}