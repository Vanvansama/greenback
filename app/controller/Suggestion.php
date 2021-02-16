<?php
namespace app\controller;

use app\BaseController;

class Suggestion extends BaseController
{
    public function index()
    {
        $data = [];
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}