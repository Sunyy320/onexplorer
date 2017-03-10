<?php
namespace Home\Controller;
use Org\Util\AjaxPage;
use Think\Controller;

class StrategyController extends BaseController{
	public function index(){
		layout("Index/layout");
		load('@.findname');

		//取出数据库中的内容
		$strategy=M("Strategy");

		//每一页的内容
		$count=$strategy->count();
		$Page=new AjaxPage($count,5);

		$Page->setConfig('first','首页');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('last','尾页');

		$show=$Page->show();

		$res=$strategy->order('artime')->limit($Page->firstRow.','.$Page->listRows)->select();
        findname($res);




		//精品推荐侧栏，按点赞数选出4个
		$tuij=$strategy->field('id,userid,longtitle')->order('supportsum')->limit(4)->select();
		findname($tuij);


		//最新出炉
		$last=$strategy->field('id,userid,longtitle')->order('artime')->limit(4)->select();
		findname($last);


		//轮播图片
		$flash=M("flash");
		$pic=$flash->field('title,url,pic')->limit(4)->order('creatime')->where("belong='strategy'")->select();


		$this->assign("page",$show);
		$this->assign('res',$res);
		$this->assign("tuij",$tuij);
		$this->assign("last",$last);
		$this->assign("pic",$pic);


		$this->display();
	}


	//显示详情
	public function showct(){
		layout("Index/layout");

		$id=$_GET['id'];
		$username=$_GET['name'];

		//连表查询所需要的字段
		$strategy=M("Strategy");
		$res=$strategy->field('s.shortitle,s.longtitle,s.place,s.supportsum,c.artitle,c.artcontent')->table(array('strategy'=>'s','strategyct'=>'c'))->where("s.id=c.artid and s.id=$id")->find();

		$res['id']=$id;
		$res['username']=$username;

		//分割标题和文章，得到短标题和段落
		$res['artitle_all']=explode("|",$res['artitle']);
		$res['artcontent_all']=explode("|",$res['artcontent']);

		$this->assign("res",$res);
		$this->display();
	}

	//点赞处理
	public function dianzan(){
		$id=$_POST['id'];

		$strategy=M("Strategy");

		$strategy->where("id=$id")->setInc("supportsum");

		echo "点赞+1";
	}


}