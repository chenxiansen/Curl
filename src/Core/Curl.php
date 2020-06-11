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
    private $config = [
        "CURLOPT_TIMEOUT"                   =>    10,                   //超时时间
        "CURLOPT_HEADER"                    =>     0,                   //启用时会将头文件的信息作为数据流输出。 1：0 ，true：false
        "CURLOPT_RETURNTRANSFER"            =>     1,                   //TRUE 将curl_exec()获取的信息以字符串返回，而不是直接输出。
        "CURLOPT_SSL_VERIFYPEER"            =>     false,               //默认禁用https
        "CURLOPT_SSL_VERIFYHOST"            =>     false,               //默认禁用https
        "CURLOPT_PROXYAUTH"                 =>     null,                //代理认证模式
        "CURLOPT_PROXY"                     =>     null,                //代理服务器ip
        "CURLOPT_PROXYPORT"                 =>     null,                //代理服务器port
    ];

    public function __construct()
    {
        if(! isset($this->curl))
        {
            $this->init();
        }
        $this->resetConf($this->config);
    }

    public function get($uri)
    {
        //设置请求参数
        curl_setopt($this->curl, CURLOPT_URL, $uri);
        //执行请求
        return $this->exec();
    }

    public function post($uri,$data = [])
    {
        curl_setopt($this->curl, CURLOPT_URL, $uri);
        curl_setopt($this->curl, CURLOPT_POST, 1);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
        return $this->exec();
    }

    //初始化
    protected function init()
    {
        $this->curl = curl_init();
    }

    //执行
    protected function exec()
    {
        //执行并获取内容
        $result = curl_exec($this->curl);
        $this->close();

        return $result;
    }

    //查看配置信息
    public function getInfo()
    {
        return curl_getinfo($this->curl);
    }

    //设置参数
    public function setConf(array $config)
    {
        foreach ($this->config as $c => $v)
        {
            if(array_key_exists($c,$config))
            {
                $this->config[$c] = $config[$c];
            }
        }
        $this->resetConf($this->config);
    }

    //重置资源
    private function resetConf(array $config)
    {
        curl_reset($this->curl);
        foreach ($config as $c => $v)
        {
            if($config[$c] === null)
            {
                unset($config[$c]);
            }
        }
        curl_setopt_array($this->curl,$config);
    }

    //查看参数
    public function getConf()
    {
        return $this->config;
    }

    //释放资源
    protected function close($ch = null)
    {
        curl_close($ch ?? $this->curl);
    }
}