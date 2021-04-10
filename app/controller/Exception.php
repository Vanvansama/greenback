<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;


class Exception extends BaseController
{
    public function save($address, $bikeId, $errorInfo, $imgList, $openId)
    {
        $userId = $openId;
        Db::table('exception')->save(['address' => $address, 'bikeId' => $bikeId, 'errorInfo' => $errorInfo, 'imgList' => implode(',', $imgList), 'userId' => $userId ]);

        $data = ['status' => 'success'];
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }

    public function index()
    {
        $data = Db::table('exception')->select();
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }

    public function update($exceptionId)
    {
        $data = [];
        Db::table('exception')->where('id', $exceptionId)->update(['status' => 1]);
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}