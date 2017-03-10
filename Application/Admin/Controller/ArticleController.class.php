<?php
/**
 * 作    者：Sunyy320
 * 日    期：2016-09-18
 * 版    本：1.0.0
 * 功能说明：乐交流管理控制器
 *
 **/

namespace Admin\Controller;



class ArticleController extends ComController
{

    //添加乐交流页面
    public function add()
    {
        $this->display('form');
    }

    //管理乐交流页面
    public function index($p=1)
    {
        $p = intval($p) > 0 ? $p : 1;

        $keyword=isset($_GET['keyword'])?htmlentities($_GET['keyword']):false;
        $order=isset($_GET['order'])?$_GET['order']:'DESC';

        $where="1=1";
        $article = M('Article');
        $count=$article->where($where)->count();
        $pagesize = 8;#每页数量
        $offset = $pagesize * ($p - 1);//计算记录偏移量,每一页的开始值
        $prefix = C('DB_PREFIX');


        if($keyword){
            $where.=" and {$prefix}article.title like '%$keyword%'";
        }

        if($order=='DESC'){
            $order="titletime desc";
        }else{
            $order="titletime asc";
        }


        $list = $article->field("{$prefix}article.title,{$prefix}article.titletime,{$prefix}article.id,{$prefix}article.address")->where($where)->order($order)->limit($offset . ',' . $pagesize)->select();


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
                $map2['titleid']=array('in',$aids);
            } else {
                $map = 'id=' . $aids;
                $map2='titleid='.$aids;
            }

            if (M('Article')->where($map)->delete()&&M('Articlemain')->where($map2)->delete()) {
                addlog('删除文章，AID：' . $aids);
                $this->success('恭喜，乐交流删除成功！');
            } else {
                $this->error('参数错误！');
            }
        } else {
            $this->error('参数错误！');
        }
    }

    //修改旅游攻略
    public function edit($aid)
    {
        $prefix = C('DB_PREFIX');
        $aid = intval($aid);

        $article = M('Article')->field('title,address,shortcontent,content,id')->join("{$prefix}Articlemain on {$prefix}Articlemain.titleid={$prefix}Article.id")->where("{$prefix}Article.id=" . $aid)->find();

        if ($article) {
            $this->assign('article', $article);
        } else {
            $this->error('参数错误！');
        }
        $this->display('form');
    }



    //添加文章或者更新文章
    public function update($aid = 0)
    {
        $aid = intval($aid);
        $title = isset($_POST['title']) ? $_POST['title'] : false;
        $content = isset($_POST['content']) ? $_POST['content'] : false;
        $address = isset($_POST['place']) ? $_POST['place'] : false;
        $shortcontent= isset($_POST['description']) ? $_POST['description'] :false ;
        $titletime= date('Y-m-d');


        //首先进行必填项的判断
        if (!$address or !$title or !$content) {
            $this->error('警告！文章标题,目的地及文章内容为必填项目。');
        }

        /*对文章进行处理
          当用户没有编写文章摘要的时候,提取文章前90个字符作为简介
		 * 内容框中获取img的路径,去前三个图片的地址
		 */
        if(empty($shortcontent)|| $shortcontent==""){
            $shortcontent=mb_substr(strip_tags($content),0,90,'utf-8');
        }


        $match=array();
        $reg = '/<img[^>]*src=[\'"]?([^\'"\s]+)[\'"]?[^>]*>/im';
        preg_match_all($reg,$content,$match);
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


        $data=array(
            'userid'=>session("uid"),
            'title'=>$title,
            'address'=>$address,
            'shortcontent'=>$shortcontent,
            'titletime'=>$titletime,
            'supportsum'=>0,
            'shortimgsrc'=>$shortimgsrc
        );


        if ($aid) {
            $data2=array(
                'titleid'=>$aid,
                'content'=>$content
            );
            M('Article')->data($data)->where('id=' . $aid)->save();
            M('Articlemain')->data($data2)->where('titleid=' . $aid)->save();
            addlog('编辑乐乐交流，AID：' . $aid);
            $this->success('恭喜！乐乐交流编辑成功！','index');
        } else {
            $aid = M('Article')->data($data)->add();
            if($aid){
                $data2=array(
                    'titleid'=>$aid,
                    'content'=>$content
                );
                if (M('Articlemain')->data($data2)->add()) {
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