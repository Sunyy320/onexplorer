<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/4
 * Time: 19:44
 */

namespace Admin\Controller;


class LogoutController extends ComController
{
    public function index()
    {
        cookie('auth', null);
        session('uid',null);
       // $url = U("login/index");
        $this->redirect("login/index");
//        header("Location: {$url}");
//        exit(0);
    }
}