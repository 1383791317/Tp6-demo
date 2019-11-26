<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\facade\Cache;
use yccustom\utils\Rsa;

class Index
{
    public function index()
    {
        $a = Rsa::encode('哈哈哈哈哈哈哈');
        echo Rsa::decode($a);
    }
}
