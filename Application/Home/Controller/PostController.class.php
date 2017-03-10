<?php

namespace Home\Controller;

use Think\Controller;

class PostController extends CommonController{
	
	public function index(){
	
		$topic = M('topic');
		$users = M('users');
		$comments = M('comments');
		$tid = $_GET['tid'];
		if($tid == "" || is_null($tid)){
			$tid = 1;
		}
		$data = $topic -> where("tid=".$tid) ->find();
		$uid = $data['uid'];
		$uarray = $users -> where("id=".$uid)->find();
		$data['uidname'] = $uarray['username'];
		
		$this -> assign('topicdata',$data);
		
		//读取所有评论
		$commentList = $comments -> where("tid=".$tid)->select();
		foreach($commentList as $key => $value){
			$u = $value['uid'];
			$cname = $users -> select("$u");
			$commentList[$key]["uid"] = $cname[0]['username'];
		}
		$this -> assign('commentList',$commentList);
		
		
		$this->display();
		
		
	}
	
	
}