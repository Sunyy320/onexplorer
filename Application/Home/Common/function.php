<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/5
 * Time: 15:57
 */
/**
 * 函数：加密
 * @param string            密码
 * @return string           加密后的密码
 */
function password($password)
{
    /*
    *后续整强有力的加密函数
    */
    return md5('Q' . $password . 'W');

}