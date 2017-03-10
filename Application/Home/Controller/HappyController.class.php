<?php

namespace Home\Controller;
use Org\Util\AjaxPage;
use Think\Controller;
use Think\Page;

/*
 * 乐交流页面控制
 * */

class HappyController extends BaseController{

    //主页面
    public function index(){
        //设置该步的url地址，为登陆成功跳转做准备
        session("url",__SELF__);
        layout("Index/layout");
        load('@.findname');

        //获取后台数据，传递给前台！循环遍历
        $Article=M("Article");

        //实现分页的功能
        $count=$Article->count();
        $Page=new AjaxPage($count,5);

       // $Page=new Page(($count,5);
        $Page->setConfig('first','首页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','尾页');

        $show=$Page->show();

        $res=$Article->order('titletime')->limit($Page->firstRow.','.$Page->listRows)->select();


        //循环遍历，处理数组，图片最多显示5个，结果集是二维数组，所以，此时也建立一个
        //二维数组，单独分配5个单位给图片，后续视图好显示
        $arr=array();
        foreach($res as $key=>$val){
            $arr[$key]['id']=$val['id'];
            $arr[$key]['title']=$val['title'];
            $arr[$key]['address']=$val['address'];
            $arr[$key]['shortcontent']=$val['shortcontent'];
            $arr[$key]['titletime']=$val['titletime'];
            $arr[$key]['supportsum']=$val['supportsum'];

            //取出姓名
            $users=M('Users');
            $where['id']=$val['userid'];
            $res2=$users->where($where)->find();
            $arr[$key]['username']=$res2['username'];

            //遍历图片
            $res3=explode("|",$val['shortimgsrc']);
            $arr[$key]['images']=$res3;
        }


         //按时间排序
        $tuij=$Article->field('id,userid,title')->order('titletime')->limit(5)->select();
        findname($tuij);


        //按点赞数
        $dianz=$Article->field('id,userid,title')->order('supportsum')->limit(5)->select();
        findname($dianz);


        $this->assign("page",$show);
        $this->assign("arr",$arr);
        $this->assign("tuij",$tuij);
        $this->assign("dianz",$dianz);

        $this->display();
    }


    //乐交流的详细页面
    public function  showcnt(){
        session("url",__SELF__);
        layout("Index/layout");

        //接受传递过来的参数
        $titleid=$_GET['id'];
        $username=$_GET['name'];

        $arr=array();
        $arr['id']=$titleid;
        $arr['username']=$username;

        $Article=M("Article");
        $where['id']=$titleid;
        $res=$Article->where($where)->find();
        $arr['title']=$res['title'];
        $arr['address']=$res['address'];
        $arr['titletime']=$res['titletime'];
        $arr['supportsum']=$res['supportsum'];



        $Articlemain=M('Articlemain');
        $where2['titleid']=$titleid;
        $res=$Articlemain->where($where2)->find();

        $arr['content']=$res['content'];

        //var_dump($res);

        $this->assign('arr',$arr);
        $this->display();
    }

    //显示添加页面
    public function addarticle(){
        //session("url",__SELF__);
        layout("Index/layout");

        $this->display();
    }

    //对于添加页面进行插入数据库处理
    public function add(){
         $title=$_POST['add_title'];
         $address=$_POST['add_address'];
         $content=$_POST['content'];
         $shortcontent=mb_substr(strip_tags($content),0,100,'utf-8');

         //从内容框中获取img的路径
        $match=array();
        $reg = '/<img[^>]*src=[\'"]?([^\'"\s]+)[\'"]?[^>]*>/im';
        preg_match_all($reg,$content,$match);
        /*
         * 匹配所有的img 中的url，存放在match中
         * array (size=2)
              0 =>
                array (size=2)
                  0 => string '<img src="/Uploads/20160625/1466841266494004.jpg" title="1466841266494004.jpg" alt="5.jpg" height="203" width="321"/>' (length=117)
                  1 => string '<img src="/Uploads/20160625/1466841291111611.jpg" title="1466841291111611.jpg" alt="4.jpg" height="219" width="410"/>' (length=117)
              1 =>
                array (size=2)
                  0 => string '/Uploads/20160625/1466841266494004.jpg' (length=38)
                  1 => string '/Uploads/20160625/1466841291111611.jpg' (length=38)
         */

        $shortimgsrc="";
        $count=count($match[1]);
        foreach($match[1] as $key=>$val){
            if($key<3 && $val!=''){
                if($key!=$count-1){
                    $shortimgsrc.=$val."|";
                }else{
                    $shortimgsrc.=$val;
                }
            }
        }

        //存放数据库
        $Article=D("Article");
        $data=array(
            'userid'=>session("id"),
            'title'=>$title,
            'address'=>$address,
            'shortcontent'=>$shortcontent,
            'titletime'=>date('Y-m-d'),
            'supportsum'=>'0',
            'shortimgsrc'=>$shortimgsrc
        );

        if(!$Article->create($data)){
            echo $Article->getError();
        }else{
            $titleid=$Article->add();
        }

        $Articlemain=D("Articlemain");
        $data2=array(
            'titleid'=>$titleid,
            'content'=>$content
        );

        if(!$Articlemain->create($data2)){
            echo $Articlemain->getError();
        }else{
            $Articlemain->add();
        }

        $this->redirect("happy/index");
    }


    //点赞处理
    public function dianzan(){
        $id=$_POST['id'];

        $Article=M("Article");

        $Article->where("id=$id")->setInc("supportsum");

        echo "点赞+1";
    }


}