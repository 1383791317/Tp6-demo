<?php
/**
 * *************************************
 * Author: 大鱼
 * E_mail: yc_1224@163.com
 * Date  : 2019/11/14 0014
 * *************************************
 */
namespace yccustom\utils;

use think\Response;

class Json
{
    private $success = 1;
    private $fail = 0;
    
    public function code(int $code): self
    {
        $this->success = $code;
        
        return $this;
    }
    
    private function make(int $status, string $msg,int $code, ?array $data = null): Response
    {
        $res = compact('status','code','msg');
        
        if (!is_null($data))
            $res['data'] = $data;
        
        return Response::create($res, 'json', $this->success);
    }
    
    public function success($msg = 'ok',?int $code = 1, ?array $data = null): Response
    {
        if (is_array($msg)) {
            $data = $msg;
            $msg = 'ok';
        }
        
        return $this->make($this->success, $msg, $code, $data);
    }
    
    public function successful(...$args): Response
    {
        return $this->success(...$args);
    }
    
    public function fail($msg = 'fail', ?array $data = null): Response
    {
        if (is_array($msg)) {
            $data = $msg;
            $msg = 'ok';
        }
        $code = 9999;
        return $this->make($this->fail, $msg, $code, $data);
    }
    
    public function status($status, $msg, $result = [])
    {
        $status = strtoupper($status);
        if (is_array($msg)) {
            $result = $msg;
            $msg = 'ok';
        }
        
        return $this->success($msg, compact('status', 'result'));
    }
}