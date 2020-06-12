<?php
/**
 * Created by PhpStorm.
 * User: Smater <1849132652@qq.com>
 * Date: 2020/6/12
 * Time: 17:54
 */

namespace Curl\Core\Concrete;


use Curl\Core\Contracts\HttpRequest as HttpContract;

class HttpPost implements HttpContract
{
    public $uri;
    public $data;

    public function __construct($uri,$data)
    {
        $this->uri = $uri;
        $this->data = $data;
    }

    public function init(array $config)
    {
        // TODO: Implement init() method.
    }
}