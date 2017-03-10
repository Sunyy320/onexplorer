<?php

namespace Home\Controller;
use Think\Controller;

class CommentsController extends CommonController{
	
	public function add(){

		if ($_SESSION['id'] =="" || is_null($_SESSION['id'])) {
			$this->error("您还没有登录，请先登陆",U("Login/index"));
		}
		
		$comment = M('comments');
		$topic = M('topic');
		$data['uid'] = $_SESSION['id'];
		$data['tid'] = $_POST['tid'];
		$data['content'] = $_POST['commentcontent'];
		$data['time'] = time();
		
		$count = $comment->where("tid=".$data['tid'])->count();
		//楼层加1
		$data['floor'] = $count+1;
		
		//在帖子表中更新，评论数加1
		
		$commentCount = $topic->where("tid=".$data['tid'])->getField('comment');
		$data1['comment'] = (int)$commentCount + 1;
		$topic->where("tid=".$data['tid'])->data($data1)->save();
		//添加评论
		$comment->data($data)->add();
		
		$this->success("回帖成功,正在返回...",U('Post/index?tid='.$data['tid']));
		
	}
	
	
}