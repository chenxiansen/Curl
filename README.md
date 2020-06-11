# Curl
Http请求扩展
####GET请求：
    $handle = new Curl();
    $result = $handle->get("https://www.xxx.com");
####POST请求：
    $handle = new Curl();
    $result = $handle->post("https://www.xxx.com",[
        "username"=>"test",
        "password"=>"123456"
    ]);
####代理请求：
    $handle = new Curl();
    $handle->setConf([
        CURLOPT_PROXY  =>  "47.244.189.14",                //代理IP
        CURLOPT_PROXYPORT  =>  58888,                      //代理端口
    ]);
    $result = $handle->get("https://www.xxx.com");
####参数设置：
    $handle = new Curl();
    $handle->setConf([
        CURLOPT_TIMEOUT  => 100,                        //设置超时时间
    ]);
    