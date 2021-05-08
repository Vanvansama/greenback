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
        return json($res);
    }

    public function update($bikeId, $openId, $address)
    {
        $userId = $openId;
        $data = [];
        $bike = Db::table('bike')->where('id', $bikeId)->find();
        if ($bike['state'] == 'close' && $bike['userId'] == NULL) {
            Db::startTrans();
            try {
                Db::name('bike')
                    ->where('id', $bikeId)
                    ->update(['state' => 'open', 'location' => $address, 'userId' => $openId]);
                Db::name('record')
                    ->save(['begin_addr' => $address, 'date' => date("Y-m-d H:i:s"), 'bikeId' => $bikeId, 'userId' => $openId]);
                Db::commit();
                $data = ['status' => 'open-success'];
            } catch (\Exception $e) {
                // 回滚事务
                var_dump($e);
                Db::rollback();
                $data = ['status' => 'fail'];
            }
        } else if ($bike['state'] == 'open' && $bike['userId'] == $openId) {
            Db::startTrans();
            try {
                Db::name('bike')
                    ->where('id', $bikeId)
                    ->update(['state' => 'close', 'location' => $address, 'userId' => NULL]);
                Db::name('record')
                    ->where([['bikeId', '=', $bikeId], ['userId', '=', $openId], ['state', '=', 1]])
                    ->update(['end_addr' => $address, 'state' => 0, 'date' => date("Y-m-d H:i:s")]);
                $user = Db::name('user')
                    ->where('id', $openId)
                    ->find();
                Db::name('user')
                    ->where('id', $openId)
                    ->update(['amout' => ($user['amout'] - 1)]);
                Db::commit();
                $data = ['status' => 'close-success'];
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                $data = ['state' => 'fail'];
            }
        } else {
            $data = ['status' => 'failed'];
        }
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}