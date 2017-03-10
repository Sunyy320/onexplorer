<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends BaseController {
    //显示登陆页面
    public function index(){

        $this->display();
    }

    //登陆验证
    
    public function  login(){
        $username=trim($_POST['username']);
        $pwd=password($_POST['password']);


        $where=array(
            'user'=>$username,
            'password'=>$pwd
        );

        $Users=M('Member');
        $count=$Users->where($where)->count();

        $arr=$Users->field('uid')->where($where)->find();

        if($count>0){
            session('username',$username);
            session('id',$arr['uid']);

            $data=array(
                'info'=>'ok',
                'callback'=>empty(session('url'))?U('index/index'):session('url')
            );
        }else{
            $data=array(
                'info'=>'error'
            );
        }
        $this->ajaxReturn($data);
    }

    // 退出登陆
    public function loginout(){
        session("username",null);
        session("id",null);
    }


    //注册页面
    public function reg(){
        $this->display();
    }

    //验证注册,插入数据库
    public function  checkreg(){
        //去除首尾空格
        $username=trim($_POST['username']);
        $password=password(trim($_POST["password"]));
        $password2=password(trim($_POST["password2"]));
        $email=trim($_POST["email"]);

        $data=array(
            "user"=>$username,
            "password"=>$password,
            "password2"=>$password2,
            "email"=>$email,
        );
        $Users=D("Member");

        $data['t']=time();

        if(!$Users->create($data)){
            echo $Users->getError();
        }else{
            $res=$Users->add();
            if(!res){
                echo "请确认输入信息！";
            }else{
                session('username',$username);
                session('id',$res);
            }
        }
    }
}