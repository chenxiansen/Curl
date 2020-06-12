<?php
/**
 * Created by PhpStorm.
 * User: Smater <1849132652@qq.com>
 * Date: 2020/6/12
 * Time: 17:52
 */

namespace Curl\HttpCore\Concrete;


use Curl\HttpCore\Contracts\HttpRequest as HttpContract;

class HttpGet implements HttpContract
{
    public $uri;

    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    public function init(array $config)
    {
        // TODO: Implement init() method.
    }
}