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
    use CurlTrait;

    public $url = null;
    public $config = array();

    public function __construct()
    {

    }

    public function get($url, $data = array())
    {
        if (is_array($url)) {
            $data = $url;
            $url = (string)$this->url;
        }
        $this->setUrl($url, $data);
        $this->setOpt(CURLOPT_CUSTOMREQUEST, 'GET');
        $this->setOpt(CURLOPT_HTTPGET, true);
        return $this->exec();
    }

    public function post()
    {
        // TODO: Implement post() method.
    }

    public function head()
    {
        // TODO: Implement head() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function options()
    {
        // TODO: Implement options() method.
    }

    public function  put()
    {
        // TODO: Implement put() method.
    }

}