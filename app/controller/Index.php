<?php
namespace app\controller;

use app\BaseController;
use think\facade\Db;
// use think\facade\Session;

class Index extends BaseController
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V' . \think\facade\App::version() . '<br/><span style="font-size:30px;">14载初心不改 - 你值得信赖的PHP框架</span></p><span style="font-size:25px;">[ V6.0 版本由 <a href="https://www.yisu.com/" target="yisu">亿速云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ee9b1aa918103c4fc"></think>';
    }

    public function hello($name = 'ThinkPHP')
    {
        return 'hello,' . $name;
    }

    public function openId($code, $app_id)
    {

        $loginUrl = "https://api.weixin.qq.com/sns/jscode2session?appid=wx205209dddadfb39b&secret=e46366afdade4aa8d9882fd39de9f0bf&js_code=$code&grant_type=authorization_code";
        $res = file_get_contents($loginUrl);
        $wxres = json_decode($res,true);
        
        $user = Db::table('user')->where('id', $wxres['openid'])->find();
        if ($user == NULL) {
            Db::table('user')->save(['username' => '', 'password' => '', 'sex' => '', 'id' => $wxres['openid'], 'amout' => 100, 'college' => '' ]);
        }

        $data = ['openId' => $wxres['openid'], 'unionId' => 'testId'];
        $res = ['status' => 'success', 'data' => $data, "message" => "", "code" => "200" ];
        return json($res);
    }
}
