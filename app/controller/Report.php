<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;

class Report extends BaseController
{
    public function index()
    {
        // 表漏了一个status属性 0 代表未解决 1 代表解决 'status' => '0'
        $data = Db::table('report')
            ->select();
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }

    public function update($reportId)
    {
        $data = ['begin_addr' => '北京理工大学珠海学院第三饭堂', 'end_addr' => '北京理工大学珠海学院34栋宿舍', 'date' => '2020-10-15 14:56:20', 'id' => 'testID'];
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }

    public function save($address, $bikeId, $errorInfo, $imgList, $type, $openId)
    {
        $userId = $openId;
        Db::table('report')->save(['address' => $address, 'bikeId' => $bikeId, 'errorInfo' => $errorInfo, 'imgList' => implode(',', $imgList), 'userId' => $userId, 'type' => $type ]);
        
        $data = ['status' => 'success'];
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}