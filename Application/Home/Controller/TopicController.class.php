<?php

namespace Home\Controller;
use Org\Util\AjaxPage;

use Think\Controller;
use Think\Page;

class TopicController extends CommonController{
	
	public function index(){
		$topic = M('topic');
		$user = M('Users');
		import('ORG.Util.Page');
		$count = 1;
		
		$count = $topic -> count();
		$page = new AjaxPage($count,8);
		$show = $page -> show();
		$topicList = $topic -> limit($page->firstRow.','.$page->listRows)->order('tid desc')->select();
		$this->assign('show',$show);
		foreach ($topicList as $key => $value) {
	
			// 把用户的id号转换成对应的用户名
			$u = $value['uid'];
			$cname = $user -> select("$u");
			//为主题列表数组增加一列，显示用户名，同时保留uid字段
			$topicList[$key]["uidname"] = $cname[0]['username'];
		
		}
		// var_dump($topicList);
		$this->assign('data',$topicList);
		
		$this->display('index');
	}
	
	public function newpost(){
		//$username = $_SESSION['username'];
		//$userid = $_SESSION['id'];
		//echo $username;
		//echo $userid;
		if ($_SESSION['id'] =="" || is_null($_SESSION['id'])) {
			$this->error("您还没有登录，请先登陆",U('Login/index'));
			return;
		}
		
		$Topic = M('Topic');
		$get = $Topic->select();
		
		$data['uid'] = $_SESSION['id'];
		$data['title'] = $_POST['title'];
		$data['content'] = $_POST['content'];
		$data['posttime'] = time();
		$data['comment'] = 0;
		
		if($data['title']!=null && $data['content']!=null){
		$Topic->data($data)->add();
		$this->success('发帖成功',U('Topic/index'));	
		}else{
			echo "<script language='javascript'>alert('帖子标题和内容不能为空');window.history.back(-1);</script>";
			
		}
	}
	
}