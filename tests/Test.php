<?php
/**
 * Created by PhpStorm.
 * User: Smater <1849132652@qq.com>
 * Date: 2020/6/10
 * Time: 20:48
 */

namespace Curl\Tests;


use Curl\Core\Curl;

class Test
{
    public function index()
    {
        $curl = new Curl();
        $curl->setConf([
            "timeout"=>100
        ]);
        var_dump($curl->get("http://www.baidu.com"));
    }
}

$test = new Test();
$test->index();