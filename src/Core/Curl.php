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
        CURLOPT_TIMEOUT                   =>    10,                   //超时时间
        CURLOPT_HEADER                    =>     0,                   //启用时会将头文件的信息作为数据流输出。 1：0 ，true：false
        CURLOPT_RETURNTRANSFER            =>     1,                   //TRUE 将curl_exec()获取的信息以字符串返回，而不是直接输出。
        CURLOPT_URL                       =>     null,                //uri地址
        CURLOPT_POST                      =>     null,                //post请求
        CURLOPT_POSTFIELDS                =>     null,                //post请求内容
        CURLOPT_SSL_VERIFYPEER            =>     false,               //默认禁用https
        CURLOPT_SSL_VERIFYHOST            =>     false,               //默认禁用https
        CURLOPT_PROXYAUTH                 =>     null,                //代理认证模式    CURLAUTH_BASIC
        CURLOPT_PROXY                     =>     null,                //代理服务器ip
        CURLOPT_PROXYPORT                 =>     null,                //代理服务器port
        CURLOPT_PROXYTYPE                 =>     null,                //代理类型    CURLPROXY_HTTP
        CURLOPT_FOLLOWLOCATION            =>     1,                   //是否允许重定向 1：0 ，tru：false
        CURLOPT_USERAGENT                 =>     "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0",                //浏览器头文件：'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0'
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
        $this->setConf([
            CURLOPT_URL           =>$uri
        ]);
        return $this->exec();
    }

    public function post($uri,$data = [])
    {
        $this->setConf([
            CURLOPT_URL           =>$uri,
            CURLOPT_POST          =>1,
            CURLOPT_POSTFIELDS    =>$data
        ]);
        return $this->exec();
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

    //查看参数
    public function getConf()
    {
        return $this->config;
    }

    private function init()
    {
        $this->curl = curl_init();
    }

    private function exec()
    {
        //执行并获取内容
        $result = curl_exec($this->curl);
        //错误检测
        if($error = $this->error())
        {
            return $error;
        }
        $this->close();

        return $result;
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

    //释放资源
    private function close()
    {
        curl_close($this->curl);
    }

    //错误检测
    private function error()
    {
        if(curl_error($this->curl))
        {
            $error_msg = curl_error($this->curl);
            $error_no  = curl_errno($this->curl);
            $this->close();
            return ["error_msg"=>$error_msg,"error_no"=>$error_no];
        }
        return false;
    }
}