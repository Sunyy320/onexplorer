<?php
/**
 * 作    者：Sunyy320
 * 日    期：2016-09-18
 * 版    本：1.0.0
 * 功能说明：旅游攻略管理
 *
 **/

namespace Admin\Controller;



class StrategyController extends ComController
{

    //添加旅攻略页面
    public function add()
    {
        $this->display('form');
    }

    //管理旅游攻略页面
    public function index($p=1)
    {
        $p = intval($p) > 0 ? $p : 1;

        $keyword=isset($_GET['keyword'])?htmlentities($_GET['keyword']):false;
        $order=isset($_GET['order'])?$_GET['order']:'DESC';

        $where="1=1";
        $article = M('strategy');
        $count=$article->where($where)->count();
        $pagesize = 8;#每页数量
        $offset = $pagesize * ($p - 1);//计算记录偏移量,每一页的开始值
        $prefix = C('DB_PREFIX');


        if($keyword){
            $where.=" and {$prefix}strategy.longtitle like '%$keyword%'";
        }

        if($order=='DESC'){
            $order="artime desc";
        }else{
            $order="artime asc";
        }


        $list = $article->field("{$prefix}strategy.longtitle,{$prefix}strategy.artime,{$prefix}strategy.id,{$prefix}strategy.place")->where($where)->order($order)->limit($offset . ',' . $pagesize)->select();


        $page = new \Think\Page($count, $pagesize);
        $page = $page->show();
        $this->assign('list', $list);
        $this->assign('page', $page);
        $this->display();
    }

    //删除旅游攻略
    public function del()
    {
        $aids = isset($_REQUEST['aids']) ? $_REQUEST['aids'] : false;
        if ($aids) {
            if (is_array($aids)) {
                $aids = implode(',', $aids);
                $map['id'] = array('in', $aids);
                $map2['artid']=array('in',$aids);
            } else {
                $map = 'id=' . $aids;
                $map2='artid'.$aids;
            }

            if (M('strategy')->where($map)->delete()&&M('strategyct')->where($map2)->delete()) {
                addlog('删除文章，AID：' . $aids);
                $this->success('恭喜，旅游攻略删除成功！');
            } else {
                $this->error('参数错误！');
            }
        } else {
            $this->error('参数错误！');
        }
    }

    public function edit($aid)
    {
        $prefix = C('DB_PREFIX');
        $aid = intval($aid);

        $article = M('strategy')->field('shortitle,longtitle,place,shortcontent,artcontent,artid,artitle')->join("{$prefix}strategyct on {$prefix}strategyct.artid={$prefix}strategy.id")->where("{$prefix}strategy.id=" . $aid)->find();

        if ($article) {
            //分割标题和文章，得到短标题和段落
            $article['artitle_all']=explode("|",$article['artitle']);
            $article['artcontent_all']=explode("|",$article['artcontent']);

            $str="";
            foreach($article['artcontent_all'] as $key=>$val){
                  $str.=$val;
                  if($article['artitle_all'][$key]!=''){
                      $str.="<h2>".$article['artitle_all'][$key]."</h2>";
                  }
            }

            $article['content']=$str;
            $this->assign('article', $article);
        } else {
            $this->error('参数错误！');
        }
        $this->display('form');
    }



    //添加文章或者更新文章
    public function update($aid = 0)
    {
        $longtitle = isset($_POST['title']) ? $_POST['title'] : false;
        $content = isset($_POST['content']) ? $_POST['content'] : false;
        $place = isset($_POST['place']) ? $_POST['place'] : false;
        $aid = intval($aid);
        $shortitle = isset($_POST['shortitle']) ? $_POST['shortitle'] : '';
        $shortcontent= isset($_POST['description']) ? $_POST['description'] :false ;
        $artime= date('Y-m-d');


        //首先进行必填项的判断
        if (!$place or !$longtitle or !$content) {
            $this->error('警告！文章标题,目的地及文章内容为必填项目。');
        }

        /*对文章进行处理
          当用户没有编写文章摘要的时候,提取文章前90个字符作为简介
		 * 获取图片所在的路径，提取第一个存储在strategy表中
		 * 获取每个小的标题，形成字符串，存储在strategyct表中
		 *获取内容，把内容分段，存储在strategyct表中
		 */
        if(empty($shortcontent)|| $shortcontent==""){
            $shortcontent=mb_substr(strip_tags($content),0,90,'utf-8');
        }

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



        $data=array(
            'shortitle'=>$shortitle,
            'longtitle'=>$longtitle,
            'artime'=>$artime,
            'place'=>$place,
            'shortcontent'=>$shortcontent,
            'imgsrc'=>$imgsrc,
            'supportsum'=>'0',
            'userid'=>session("uid")
        );
        $data2=array(
            'artid'=>$aid,
            'artitle'=>$artitle,
            'artcontent'=>$artcontent
        );

        if ($aid) {
            M('strategy')->data($data)->where('id=' . $aid)->save();
            M('strategyct')->data($data2)->where('artid=' . $aid)->save();
            addlog('编辑旅游攻略，AID：' . $aid);
            $this->success('恭喜！旅游攻略编辑成功！','index');
        } else {
            $aid = M('strategy')->data($data)->add();
            if($aid){
                if ( M('strategyct')->data($data2)->add()) {
                    addlog('新增文章，AID：' . $aid);
                    $this->success('恭喜！文章新增成功！','index');
                } else {
                    $this->error('添加文章失败！');
                }
            }else{
                $this->error("添加文章失败");
            }
        }
    }
}