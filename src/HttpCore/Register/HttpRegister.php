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
    public $http;
    protected $container;

    public function __construct()
    {
        $this->container = new HttpContainer();

        $this->container->bind("get",function ($uri){
            return new HttpGet($uri);
        });

        $this->container->bind("post",function ($uri,$data){
            return new HttpPost($uri,$data);
        });
    }
}