<?php
/**
 * *************************************
 * Author: 大鱼
 * E_mail: yc_1224@163.com
 * Date  : 2019/11/15 0015
 * *************************************
 */
use think\facade\Route;

Route::get('test', 'api/Test/index');
Route::get('test2', 'api/Test/index2')->middleware(thans\jwt\middleware\JWTAuth::class);