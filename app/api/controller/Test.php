<?php
declare (strict_types = 1);

namespace app\api\controller;

use thans\jwt\facade\JWTAuth;

class Test extends ApiBaseController
{
    public function index()
    {
        $token = JWTAuth::builder(['uid' => 1]);
        
        return app('json')->success([$token]);
    }
    
    public function index2()
    {
        return app('json')->success();
    }
}
