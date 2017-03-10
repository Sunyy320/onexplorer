<?php

namespace Home\Controller;

use Think\Controller;

class ReplyController extends CommonController{
	public function index(){
        
		if ($_SESSION['id'] =="" || is_null($_SESSION['id'])) {
			$this->error("您还没有登录，请先登陆",U("Login/index"));
		}
		$reply = M('reply');
		$tour = M('tour');
		$data['uid'] = $_SESSION['id'];
		$data['tid'] = $_POST['tid'];
		$data['content'] = $_POST['content'];
		$data['time'] = time();
	
		$count = $reply->where("tid=".$data['tid'])->count();
		//楼层加1
		$data['floor'] = $count+1;
	
		$replyCount = $tour->where("tid=".$data['tid'])->getField('replies');
		$data1['replies'] = (int)$replyCount + 1;
		$tour->where("tid=".$data['tid'])->data($data1)->save();
		
		//添加评论
	
		if($data['content']!=null){
		$reply->data($data)->add();
		$this->success("回复成功",U('Group/index?tid='.$data['tid']));
	}else{
		echo "<script language='javascript'>alert('回复内容不能为空');window.history.back(-1);</script>";
	}
		
	}
}