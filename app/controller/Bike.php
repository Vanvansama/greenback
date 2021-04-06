<?php
namespace app\controller;

use app\BaseController;

use think\facade\Db;

class Bike extends BaseController
{
    public function index()
    {
        $data = [['在借' => '300'],["明德"=>"88"],["弘毅"=>"54"],["一饭"=>"15"],["二饭"=>"75"],["三饭"=>"68"],["四饭"=>"45"],["五饭"=>"67"]];
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        // $admin = Db::table('user')->where('username', 'root')->find();
        return json($res);
    }

    public function update($bikeId, $mode)
    {
        $userId = 'testId';
        $data = [];
        $bike = Db::table('bike')->where('id', $bikeId)->find();
        if ($bike['state'] != $mode) {
            Db::name('bike')
                ->where('id', $bikeId)
                ->update(['state' => $mode]);
            // TODO
            // 这里的begin_addr 可以用bike表的location
            Db::name('record')
                ->save(['begin_addr' => '北京理工大学珠海学院第三饭堂', 'end_addr' => '北京理工大学珠海学院34栋宿舍', 'date' => time(), 'id' => 'testID']);
            $data = ['state' => 'success'];
        } else {
            $data = ['state' => 'failed'];
        }
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}