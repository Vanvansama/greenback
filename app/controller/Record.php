<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;

class Record extends BaseController
{
    public function index($userId)
    {
        // $data = [['begin_addr' => '北京理工大学珠海学院第三饭堂', 'end_addr' => '北京理工大学珠海学院34栋宿舍', 'date' => '2020-10-15 14:56:20', 'id' => 'testID']];
        $data = Db::table('record')
            ->where('id', $userId)
            ->select();
        
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }

}