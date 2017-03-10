<?php
/**
 *
 * 版权所有：恰维网络<qwadmin.qiawei.com>
 * 作    者：寒川<hanchuan@qiawei.com>
 * 日    期：2015-09-18
 * 版    本：1.0.0
 * 功能说明：对于登陆的管理员，进行个人资料的修改和上传
 **/

namespace Admin\Controller;

class PersonalController extends ComController
{
   //显示个人信息页面
    public function profile()
    {
        $member = M('member')->where('uid=' . $this->USER['uid'])->find();
        $this->assign('nav', array('Personal', 'profile', ''));//导航
        $this->assign('member', $member);
        $this->display();
    }

    //修改个人信息，存储到数据库中
    public function update()
    {
        $uid = $this->USER['uid'];
        $password = isset($_POST['password']) ? trim($_POST['password']) : false;
        if ($password) {
            $data['password'] = password($password);
        }

        $head = I('post.head', '', 'strip_tags');
        if ($head <> '') {
            $data['head'] = $head;
        }

        $data['phone'] = isset($_POST['phone']) ? trim($_POST['phone']) : '';
        $data['qq'] = isset($_POST['qq']) ? trim($_POST['qq']) : '';
        $data['email'] = isset($_POST['email']) ? trim($_POST['email']) : '';
        $isadmin = isset($_POST['isadmin']) ? $_POST['isadmin'] : '';
        if ($uid <> 1) {#禁止最高管理员设为普通会员。
            $data['isadmin'] = $isadmin == 'on' ? 1 : 0;
        }
        $Model = M('member');
        $Model->data($data)->where("uid=$uid")->save();
        addlog('修改个人资料');
        $this->success('操作成功！');

    }
}