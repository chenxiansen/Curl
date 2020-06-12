<?php
/**
 * Created by PhpStorm.
 * User: Smater <1849132652@qq.com>
 * Date: 2020/6/12
 * Time: 18:03
 */

namespace Curl\HttpCore;

use Curl\HttpCore\Register\HttpRegister;

class Http extends HttpRegister
{
    public function __construct()
    {
        parent::__construct();
    }

    //get请求
    public function get($uri)
    {
        return $this->http->make("get",$uri);
    }

    //post请求
    public function post($uri,$data)
    {
        return $this->http->make("post",$uri,$data);
    }
}