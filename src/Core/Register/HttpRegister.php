<?php
/**
 * Created by PhpStorm.
 * User: Smater <1849132652@qq.com>
 * Date: 2020/6/12
 * Time: 17:56
 */

namespace Curl\Core\Register;


use Curl\Core\Concrete\HttpGet;
use Curl\Core\Concrete\HttpPost;
use Curl\Core\Container\HttpContainer;

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