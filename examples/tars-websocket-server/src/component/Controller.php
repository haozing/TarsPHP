<?php
/**
 * Created by PhpStorm.
 * User: liangchen
 * Date: 2018/5/8
 * Time: 下午2:43.
 */

namespace WebsocketServer\component;

use Tars\core\Request;
use Tars\core\Response;

class Controller
{
    protected $request;
    protected $response;
    protected $server;

    public function __construct(Request $request, Response $response)
    {
        // 验证cookie、get参数、post参数、文件上传

        $this->request = $request;
        $this->response = $response;

        $this->server = $request->server;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function cookie($key, $value = '', $expire = 0, $path = '/', $domain = '', $secure = false, $httponly = false)
    {
        $this->response->cookie($key, $value, $expire, $path, $domain, $secure, $httponly);
    }

    // 给客户端发送数据
    public function sendRaw($result)
    {
        $this->response->send($result);
    }

    public function header($key, $value)
    {
        $this->response->header($key, $value);
    }

    public function status($http_status_code)
    {
        $this->response->status($http_status_code);
    }
}
