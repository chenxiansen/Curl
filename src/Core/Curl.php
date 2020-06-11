<?php
/**
 * Created by PhpStorm.
 * User: Smater
 * Date: 2020/6/2
 * Time: 11:21
 */

namespace Curl\Core;

use Curl\Core\Contracts\Curl as CurlContract;

class Curl implements CurlContract
{

    private $curl;
    public  $url = null;
    public  $config = array();

    public function __construct()
    {
        if(! isset($this->curl))
        {
            $this->init();
        }
    }

    public function get($uri)
    {
        //设置请求参数
        curl_setopt($this->curl, CURLOPT_URL, $uri);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_HEADER, 0);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);    //绕过ssl验证
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
        //打印请求信息
        echo 'Curl Parameter: ' . json_encode($this->getInfo());
        //执行请求
        return $this->exec();
    }

    public function post($uri,$data = array())
    {

    }


    protected function init()
    {
        $this->curl = curl_init();
    }

    protected function exec()
    {
        //执行并获取内容
        $result = curl_exec($this->curl);
        //释放curl句柄
        curl_close($this->curl);
        unset($this->curl);

        return $result;
    }


    protected function getInfo()
    {
        return curl_getinfo($this->curl);
    }
}