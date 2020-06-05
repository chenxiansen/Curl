<?php
/**
 * Created by PhpStorm.
 * User: Smater
 * Date: 2020/6/2
 * Time: 11:21
 */

namespace Curl\Core;


class Curl
{

    private $curl;
    public  $url = null;
    public  $config = array();

    public function __construct()
    {
        if(isset($this->curl))
        {
            //请求前，先重置请求信息
            $this->_reset();
            return $this->curl;
        }
        $this->curl = curl_init();
    }

    public function get($url, $data = array())
    {
        //设置请求参数
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_HEADER, 0);
        //打印请求信息
        echo 'Curl Parameter: ' . json_encode($this->_getInfo());
        //执行请求
        $this->_exec();
    }

    public function post()
    {

    }

    /**
     * @return 返回执行结果
     */
    private function _exec()
    {
        return curl_exec($this->curl);
    }

    /**
     * @return 配置参数查看
     */
    public function _getInfo()
    {
        return curl_getinfo($this->curl);
    }

    /**
     * 报错信息
     */
    public function _error()
    {
        if(curl_errno($this->curl))
        {
            echo 'Curl error: ' . curl_error($this->curl);
        }
    }

    /**
     * @return 版本信息
     */
    public function _version()
    {
        return curl_version();
    }

    /**
     * 重置
     */
    private function _reset()
    {
        return curl_reset($this->curl);
    }

    /**
     * 释放资源
     */
    public function __destruct()
    {
        curl_close($this->curl);
    }
}