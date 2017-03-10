<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class UserinfoController extends Controller{
	public function index(){
		$uid = $_SESSION['id'];
		
		$topic = M('topic');
		$User= M("users");
		$data = $topic->where("uid=".$uid)->order('tid desc')->select();
		//帖子数量
		//$count = count($data);
		//$this->assign("topicCount",$count);
		//用户名
		//$username = $User->where("id=".$uid)->getField("username");
		//$this->assign("currUsername",$username);
		
		import('ORG.Util.Page');
		$count = 1;
		$count = $topic -> count();
		$page = new Page($count,8);
		$show = $page -> show();
		//$topicList = $topic -> limit($page->firstRow.','.$page->listRows)->order('tid desc')->select();
		$this->assign('show',$show);
		
		foreach ($data as $key => $value) {
			// 把用户的id号转换成对应的用户名
			$u= $value['uid'];
			$cname=$User->select("$u");
			$data[$key]["uid"] = $cname[0]['username'];
		
		}
		$this->assign("data",$data);
		
		
		$uid = $_SESSION['id'];
		$tour = M('tour');
		$users = M('users');
		$tourList = $tour -> where("uid=".$uid)->order('tid desc')->select();
		$counts = 1;
		$counts = $tour -> count();
		$pages = new Page($counts,8);
		$shows = $pages -> show();
	//	$topicList = $tour -> limit($pages->firstRow.','.$pages->listRows)->order('tid desc')->select();
		$this->assign('shows',$shows);
		
		
		foreach ($tourList as $key => $value) {
		
			// 把用户的id号转换成对应的用户名
			$u = $value['uid'];
			$cname = $users -> select("$u");
			//为主题列表数组增加一列，显示用户名，同时保留uid字段
			$tourList[$key]["uidname"] = $cname[0]['username'];
		
		}
		// var_dump($topicList);
		$this->assign('tourList',$tourList);
		
		$this->display('index');
	
	}
}

?>