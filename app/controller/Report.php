<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;

class Report extends BaseController
{
    public function index()
    {
        // $data = [['id' => '123', 'car_id' => '123', 'address' => '北京理工大学珠海学院第三饭堂', 'type' => '0', 'desc' => '车链子坏了，接不上去2', 'status' => '0']];

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

    public function save($address, $bikeId,$errorInfo,$imgList, $type)
    {
        $userId = 'testId';
        Db::table('report')->save(['address' => $address, 'bikeId' => $bikeId, 'errorInfo' => $errorInfo, 'imgList' => $imgList, 'userId' => $userId, 'type' => $type ]);

        $data = ['status' => 'success'];
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}