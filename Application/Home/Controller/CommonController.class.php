<?php

namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{
	public function index(){
		
		if ($_SESSION['id'] =="" || is_null($_SESSION['id'])) {
			$this->error("您还没有登录，请先登陆",U("Login/index"));
		}
	}
	
}