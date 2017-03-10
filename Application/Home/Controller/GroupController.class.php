<?php

namespace Home\Controller;

use Think\Controller;

class GroupController extends CommonController{
	
	public function index(){
		$tour = M('tour');
		$users = M('users');
		$reply = M('reply');
		$tid = $_GET['tid'];
		if($tid == "" || is_null($tid)){
			$tid = 1;
		}
		$data = $tour -> where("tid=".$tid) ->find();
		$uid = $data['uid'];
		$uarray = $users -> where("id=".$uid)->find();
		$data['uidname'] = $uarray['username'];
		
		$this -> assign('tourdata',$data);
		
		//读取所有评论
		$replyList = $reply -> where("tid=".$tid)->select();
		foreach($replyList as $key => $value){
			$u = $value['uid'];
			$cname = $users -> select("$u");
			$replyList[$key]["uid"] = $cname[0]['username'];
		}
		$this -> assign('replyList',$replyList);
		$this->display();
		
	}

	
	
}