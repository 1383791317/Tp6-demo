<?php
/**
 * *************************************
 * Author: 大鱼
 * E_mail: yc_1224@163.com
 * Date  : 2019/11/15 0015
 * *************************************
 */
namespace app\api;

use think\db\exception\DbException;
use think\exception\Handle;
use think\Response;
use Throwable;

class ApiExceptionHandle extends Handle
{
    /**
     * 记录异常信息（包括日志或者其它方式记录）
     *
     * @access public
     * @param  Throwable $exception
     * @return void
     */
    public function report(Throwable $exception): void
    {
        // 使用内置的方式记录异常日志
        parent::report($exception);
    }
    
    /**
     * Render an exception into an HTTP response.
     *
     * @access public
     * @param \think\Request   $request
     * @param Throwable $e
     * @return Response
     */
    public function render($request, Throwable $e): Response
    {
        // 获取开发模式
        $debug = env('APP_DEBUG');
        // 添加自定义异常处理机制
        if ($e instanceof DbException) {
            
            $data = $debug ? [
                'file'      => $e->getFile(),
                'message'   => $e->getMessage(),
                'line'      => $e->getLine(),
            ] : ['瞅啥呢？'];
            return app('json')->fail('数据获取失败',$data);
        }else{
            
            $data = $debug ? [
                'message'     => $e->getMessage(),
                'http_status' => 500,
                'file'        => $e->getFile(),
                'line'        => $e->getLine(),
                'previous'    => $e->getPrevious(),
            ] : ['瞅啥呢？'];
            
            return app('json')->fail('系统出现异常',$data);
        }
    }
}