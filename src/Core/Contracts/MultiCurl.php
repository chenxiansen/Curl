<?php
/**
 * Created by PhpStorm.
 * User: Smater <1849132652@qq.com>
 * Date: 2020/6/10
 * Time: 20:19
 */

namespace Curl\Core\Contracts;


interface MultiCurl
{
    public function get($uri);

    public function post($uri,$data = []);
}