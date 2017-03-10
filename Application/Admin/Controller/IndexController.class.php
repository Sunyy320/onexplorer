<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Page;

class IndexController extends ComController {
    public function index(){
        $model = new Model();
        $mysql = $model->query("select VERSION() as mysql");
        $p = isset($_GET['p']) ? intval($_GET['p']) : '1';
        $t = time() - 3600 * 24 *1;
        $log = M('log');
        $log->where("t < $t")->delete();//删除15天前的日志
        $pagesize = 25;#每页数量
        $offset = $pagesize * ($p - 1);//计算记录偏移量
        $count = $log->count();
        $list = $log->order('id desc')->limit($offset . ',' . $pagesize)->select();
        $page = new Page($count, $pagesize);
        $page = $page->show();
        $this->assign('list', $list);
        $this->assign('page', $page);

        $this->assign('mysql', $mysql[0]['mysql']);
        $this->assign('nav', array('', '', ''));//导航

        $this->display();
    }
}