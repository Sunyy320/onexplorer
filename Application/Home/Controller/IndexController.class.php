<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController{
    public function index(){
        layout("Index/layout");
        load('@.findname');

        //焦点图
        $flash=M("flash");
        $pic=$flash->field('title,url,pic')->limit(4)->order('creatime')->where("belong='index'")->select();



        //旅游攻略
        $strategy=M("Strategy");
        $tuij=$strategy->field('id,userid,longtitle,imgsrc,shortcontent')->order('supportsum')->limit(3)->select();
        findname($tuij);


         //乐交流
        $Article=M("Article");
        $dianz=$Article->field('id,userid,title,supportsum,shortimgsrc')->order('supportsum')->limit(8)->select();
        foreach($dianz as $key=>$val){
            $res3=explode("|",$val['shortimgsrc']);
            $dianz[$key]['imgsrc']=$res3[0];
        }
        findname($dianz);


        //论坛
        $topic = M('topic');
        $topicres=$topic->field('tid,title')->order('posttime')->limit(5)->select();

        //团游
        $tour = M('tour');
        $tourres=$tour->field('tid,title')->order('time')->limit(5)->select();

        $this->assign("pic",$pic);
        $this->assign("strategy",$tuij);
        $this->assign("happy",$dianz);
        $this->assign("topic",$topicres);
        $this->assign("tour",$tourres);

        $this->display();
    }
}