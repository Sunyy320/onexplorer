<?php

namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Org\Util\AjaxPage;

class TourController extends CommonController{
	public function index(){
		$tour = M('tour');
		$user = M('Users');
		import('ORG.Util.Page');
		$count = 1;
		$count = $tour -> count();
		$page = new AjaxPage($count,8);
		$show = $page -> show();
		$topicList = $tour -> limit($page->firstRow.','.$page->listRows)->order('tid desc')->select();
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
	
	public function add(){
		$this->display();
		
	}
	
	public function publish(){
		
		if ($_SESSION['id'] =="" || is_null($_SESSION['id'])) {
			$this->error("您还没有登录，请先登陆",U('Login/index'));
			return;
		}
		
		
		$tour = M('tour');
		$user = M('users');
		
		$data['uid'] = $_SESSION['id'];
		$data['title'] = $_POST['title'];
		$data['start'] = $_POST['start'];
		$data['number'] = $_POST['number'];
		$data['destination'] = $_POST['destination'];
		$data['content'] = $_POST['content'];
		$data['starttime'] = $_POST['starttime'];
		$data['endtime'] = $_POST['endtime'];
		$data['time'] = time();
		
		if($data['title']==NULL || $data['start']==NULL || $data['number']==NULL || $data['destination']==NULL || $data['content']==NULL || $data['starttime']==NULL || $data['endtime']==NULL){
			$this->error("组团信息填写不完整，发布失败");
			return;
		}else{
			$this->success("活动发布成功",U('Tour/index'));
		}
		
		$tour -> data($data) -> add();
		
		
	}
	
	
}