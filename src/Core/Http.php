<?php
/**
 * Created by PhpStorm.
 * User: Smater <1849132652@qq.com>
 * Date: 2020/6/12
 * Time: 18:03
 */

namespace Curl\Core;

use Curl\Core\Register\HttpRegister;

class Http extends HttpRegister
{
    public $http;
    public function __construct()
    {
        parent::__construct();
    }

    //get请求
    public function get($uri)
    {
        return $this->container->make("get",$uri);
    }

    //post请求
    public function post($uri,$data)
    {
        return $this->container->make("post",$uri,$data);
    }
}