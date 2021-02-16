<?php
namespace app\controller;

use app\BaseController;

class Admin extends BaseController
{
    public function login($username, $password)
    {
        $data = [];
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}