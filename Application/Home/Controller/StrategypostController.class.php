<?php


namespace Home\Controller;
use Think\Controller;

/*
 * 发表旅游攻略页面控制器*/

class StrategypostController extends BaseController{

	public function index(){
		//设置该步的url地址，为登陆成功跳转做准备
		session("url",__SELF__);
		layout("Index/layout");
		$this->display();
	}


	//添加数据到数据库中
	public function add(){

		$shortitle=$_POST['shortitle'];
		$longtitle=$_POST['longtitle'];
		$place=$_POST['place'];


		/*
		 * 对内容进行处理:
		 * 获取第一段前80个字160个字符，存储在shortcontent中
		 * 获取图片所在的路径，提取第一个存储在strategy表中
		 * 获取每个小的标题，形成字符串，存储在strategyct表中
		 *获取内容，把内容分段，存储在strategyct表中
		 * */
		$content=$_POST['content'];

		//①.获取第一段前80个字160个字符，存储在shortcontent中
		$shortcontent=mb_substr(strip_tags($content),0,90,'utf-8');


		//②.获取图片所在的路径，提取第一个存储在strategy表中
		$match=array();
		$reg = '/<img[^>]*src=[\'"]?([^\'"\s]+)[\'"]?[^>]*>/im';
		preg_match($reg,$content,$match);
		$imgsrc=$match[1];

		//③获取每个小的标题，形成字符串，存储在strategyct表中
		$match2=array();
		$reg2='/<h2>(.*?)<\/h2>/i';
		preg_match_all($reg2,$content,$match2);
		$artitle="";
		$count=count($match2[1]);
		foreach($match2[1] as $key=>$val){
			if($key!=$count-1){
				$artitle.=strip_tags($val)."|";
			}else{
				$artitle.=strip_tags($val);
			}
		}

		//正则表达式替换标题，把文章分段
		$artcontent=preg_replace($reg2,"|",$content);


		//存储到数据库中
		$strategy=D("Strategy");
		$data=array(
				'shortitle'=>$shortitle,
				'longtitle'=>$longtitle,
				'artime'=>date('Y-m-d'),
				'userid'=>session("id"),
				'place'=>$place,
				'shortcontent'=>$shortcontent,
				'imgsrc'=>$imgsrc,
				'supportsum'=>'0'
		);
		if(!$strategy->create($data)){
			echo $strategy->getError();
		}else{
			$artid=$strategy->add();
		}

		$strategyct=D("Strategyct");
		$data2=array(
				'artid'=>$artid,
				'artitle'=>$artitle,
				'artcontent'=>$artcontent
		);

		if(!$strategyct->create($data2)){
			echo $strategyct->getError();
		}else{
			$strategyct->add();
		}

		$this->redirect("strategy/index");

	}


	public function test(){
		$this->display();
	}
}