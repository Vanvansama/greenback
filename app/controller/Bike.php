<?php
namespace app\controller;

use app\BaseController;

class Bike extends BaseController
{
    public function index($userId)
    {
        $data = [];
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}