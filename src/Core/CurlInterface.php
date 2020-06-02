<?php
/**
 * Created by PhpStorm.
 * User: Smater <1849132652@qq.com>
 * Date: 2020/6/2
 * Time: 11:30
 */

namespace Curl\Core;


interface CurlInterface
{
    /**
     * @return mixed
     */
    public function get();


    /**
     * @return mixed
     */
    public function post();

    /**
     * @return mixed
     */
    public function head();

    /**
     * @return mixed
     */
    public function put();


    /**
     * @return mixed
     */
    public function delete();


    /**
     * @return mixed
     */
    public function options();


}