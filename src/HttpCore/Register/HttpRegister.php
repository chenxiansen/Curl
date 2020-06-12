<?php
/**
 * Created by PhpStorm.
 * User: Smater <1849132652@qq.com>
 * Date: 2020/6/12
 * Time: 17:56
 */

namespace Curl\HttpCore\Register;


use Curl\HttpCore\Concrete\HttpGet;
use Curl\HttpCore\Concrete\HttpPost;
use Curl\HttpCore\Container\HttpContainer;

class HttpRegister
{
    protected $http;

    public function __construct()
    {
        $this->http = new HttpContainer();

        $this->http->bind("get",function ($uri){
            return new HttpGet($uri);
        });

        $this->http->bind("post",function ($uri,$data){
            return new HttpPost($uri,$data);
        });
    }
}