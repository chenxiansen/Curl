<?php
/**
 * Created by PhpStorm.
 * User: Smater <1849132652@qq.com>
 * Date: 2020/6/12
 * Time: 17:45
 */

namespace Curl\HttpCore\Container;


class HttpContainer
{
    protected $binds;

    protected $instances;

    public function bind($abstract,$concrete)
    {
        if($abstract instanceof \Closure)
        {
            $this->binds[$abstract] = $concrete;
        }else{
            $this->instances[$abstract] = $concrete;
        }
    }

    public function make($abstract,$parameters = [])
    {
        if(isset($this->instances[$abstract]))
        {
            return $this->instances[$abstract];
        }

        array_unshift($parameters,$this);

        return call_user_func_array($this->binds[$abstract],$parameters);
    }
}