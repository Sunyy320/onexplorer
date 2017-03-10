<?php
/**
 *
 * 版权所有：恰维网络<qwadmin.qiawei.com>
 * 作    者：寒川<hanchuan@qiawei.com>
 * 日    期：2016-01-19
 * 版    本：1.0.0
 * 功能说明：清楚缓存
 *
 **/

namespace Admin\Controller;

class CacheController extends ComController
{

    //清除缓存
    public function clear()
    {
        //RUNTIME_PATH===="Runtime/"
        $this->rmdirr(RUNTIME_PATH);
        $this->success('系统缓存清除成功！');
    }

    //递归删除缓存信息
    public function rmdirr($dirname)
    {
        if (!file_exists($dirname)) {
            return false;
        }

        //is_link判断是否是一个字符链接，如果是返回true，否则返回false
        if (is_file($dirname) || is_link($dirname)) {
            return unlink($dirname);//如果是文件，不是文件夹，则删除文件
        }

        //dir()打开一个目录句柄，并返回一个对象，该对象有三个方法，read，rewind，close
        $dir = dir($dirname);
        if ($dir) {
            while (false !== $entry = $dir->read()) {
                if ($entry == '.' || $entry == '..') {
                    continue;
                }
                //递归,DIRECTORY_SEPARATOR===='/',如果是目录名就继续遍历
                $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
            }
        }
        $dir->close();
        return rmdir($dirname);//删除空的目录，成功返回true
    }

}