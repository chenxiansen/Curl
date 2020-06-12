<?php
/**
 * Created by PhpStorm.
 * User: Smater <1849132652@qq.com>
 * Date: 2020/6/12
 * Time: 17:53
 */

namespace Curl\Core\Contracts;


interface HttpRequest
{
    public function init(array $config);
}