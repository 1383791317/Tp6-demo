<?php
/**
 * *************************************
 * Author: 大鱼
 * E_mail: yc_1224@163.com
 * Date  : 2019/11/20 0020
 * *************************************
 */
namespace yccustom\utils;


class Rsa
{
    private static $public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCmkANmC849IOntYQQdSgLvMMGm
8V/u838ATHaoZwvweoYyd+/7Wx+bx5bdktJb46YbqS1vz3VRdXsyJIWhpNcmtKhY
inwcl83aLtzJeKsznppqMyAIseaKIeAm6tT8uttNkr2zOymL/PbMpByTQeEFlyy1
poLBwrol0F4USc+owwIDAQAB
-----END PUBLIC KEY-----';
    
    private static  $private_key = '-----BEGIN PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAKaQA2YLzj0g6e1h
BB1KAu8wwabxX+7zfwBMdqhnC/B6hjJ37/tbH5vHlt2S0lvjphupLW/PdVF1ezIk
haGk1ya0qFiKfByXzdou3Ml4qzOemmozIAix5ooh4Cbq1Py6202SvbM7KYv89syk
HJNB4QWXLLWmgsHCuiXQXhRJz6jDAgMBAAECgYAIF5cSriAm+CJlVgFNKvtZg5Tk
93UhttLEwPJC3D7IQCuk6A7Qt2yhtOCvgyKVNEotrdp3RCz++CY0GXIkmE2bj7i0
fv5vT3kWvO9nImGhTBH6QlFDxc9+p3ukwsonnCshkSV9gmH5NB/yFoH1m8tck2Gm
BXDj+bBGUoKGWtQ7gQJBANR/jd5ZKf6unLsgpFUS/kNBgUa+EhVg2tfr9OMioWDv
MSqzG/sARQ2AbO00ytpkbAKxxKkObPYsn47MWsf5970CQQDIqRiGmCY5QDAaejW4
HbOcsSovoxTqu1scGc3Qd6GYvLHujKDoubZdXCVOYQUMEnCD5j7kdNxPbVzdzXll
9+p/AkEAu/34iXwCbgEWQWp4V5dNAD0kXGxs3SLpmNpztLn/YR1bNvZry5wKew5h
z1zEFX+AGsYgQJu1g/goVJGvwnj/VQJAOe6f9xPsTTEb8jkAU2S323BG1rQFsPNg
jY9hnWM8k2U/FbkiJ66eWPvmhWd7Vo3oUBxkYf7fMEtJuXu+JdNarwJAAwJK0YmO
LxP4U+gTrj7y/j/feArDqBukSngcDFnAKu1hsc68FJ/vT5iOC6S7YpRJkp8egj5o
pCcWaTO3GgC5Kg==
-----END PRIVATE KEY-----';
    
    public static function encode($data)
    {
        $return_en = openssl_public_encrypt($data, $crypted, self::$public_key);
        
        return $crypted;
    }
    
    public static function decode($sign)
    {
        $return_de = openssl_private_decrypt($sign, $decrypted, self::$private_key);
        
        return $decrypted;
    }
}