<?php
namespace Test;
require_once __DIR__."/../vendor/autoload.php";

use Curl\Core\Curl;

class Test
{
    public function test()
    {
        //直接调，则静态方法没有实例化，及Curl里面构造方法没有实例化
        $tmp = (new Curl())->get("http://www.pyfans.org");
        var_dump($tmp);exit;
    }
}

$tmp = new Test();
$tmp->test();