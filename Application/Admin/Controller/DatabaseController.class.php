<?php
/**
 *
 * 版权所有：恰维网络<qwadmin.qiawei.com>
 * 作    者：寒川<hanchuan@qiawei.com>
 * 日    期：2016-01-19
 * 版    本：1.0.0
 * 功能说明：数据库备份、还原控制器。
 *
 **/

namespace Admin\Controller;

use Think\Db;
use Vendor\Database;


class DatabaseController extends ComController
{
    //初始化页面
    public function backup(){
        //得到数据库实例
         $DB=DB::getInstance();
        //查看表的状态，记录行数和数据量
        $list=$DB->query("SHOW TABLE STATUS");
        //array_map将用户自定义函数作用到数组中的每个值上，并返回用户自定义函数作用后的带有新值的数组,array_change_key_case() 函数将数组的所有的 KEY 都转换为大写或小写。
        $list=array_map('array_change_key_case',$list);
        //var_dump($list);die;
        $this->assign("list",$list);
        $this->display();
    }


    //优化表
    public function optimize($tables=null){
        if($tables){
            $DB=DB::getInstance();
            if(is_array($tables)){
                $tables=implode(",",$tables);
                $list=$DB->query("OPTIMIZE TABLE {$tables}");

                if($list){
                    addlog("优化表完成");
                    $this->success("优化数据库表完成");
                }else{
                    $this->error("优化数据库表出现错误");
                }
            }else{
                $list=$DB->query("OPTIMIZE TABLE {$tables}");
                if($list){
                    addlog("优化表{$tables}完成");
                    $this->success("优化数据库表{$tables}完成");
                }else{
                    $this->error("优化数据库表{$tables}出现错误");
                }
            }
        }else{
            $this->error("请指定要优化的表");
        }
    }


    //修复表
    public function repair($tables = null){
        if($tables){
            $DB=DB::getInstance();
            if(is_array($tables)){
                $tables=implode(",",$tables);
                $list=$DB->query("REPAIR TABLE {$tables}");

                if($list){
                    addlog("修复数据库表完成");
                    $this->success("修复数据库表完成");
                }else{
                    $this->error("修复数据库表出现错误");
                }
            }else{
                $list=$DB->query("REPAIR TABLE {$tables}");
                if($list){
                    addlog("修复数据库表{$tables}完成");
                    $this->success("修复数据库表{$tables}完成");
                }else{
                    $this->error("修复数据库表{$tables}出现错误");
                }
            }
        }else{
            $this->error("请指定要修复的表");
        }
    }



    //数据库表备份打包
    public function export($tables = null, $id = null, $start = null){
        /*
         * 刚刚传入的时候，id和$start的值都是空的，之后初始化为0，
         * 之后id和start++，进入elseif页面
         * */
        if (IS_POST && !empty($tables) && is_array($tables)) { //初始化
            //读取备份配置
            $config = array(
                'path' => realpath(C('DB_PATH')) . DIRECTORY_SEPARATOR,  //路径
                'part' => C('DB_PART'),  //分卷大小 20M
                'compress' => C('DB_COMPRESS'),  //0:不压缩 1:启用压缩
                'level' => C('DB_LEVEL'),  //压缩级别, 1:普通 4:一般  9:最高
            );

            //检查是否有正在执行的任务
            $lock = "{$config['path']}backup.lock";

            if (is_file($lock)) {
                $this->error('检测到有一个备份任务正在执行，请稍后再试！');
            } else {
                //创建锁文件
                file_put_contents($lock, NOW_TIME);
            }

            //检查备份目录是否可写 创建备份目录
            is_writeable($config['path']) || mkdir('./' . C("DB_PATH_NAME") . '', 0777, true);
            session('backup_config', $config);

            //生成备份文件信息
            $file = array(
                'name' => date('Ymd-His', NOW_TIME),
                'part' => 1,
            );
            session('backup_file', $file);

            //缓存要备份的表
            session('backup_tables', $tables);

            //创建备份文件
            $Database = new Database($file, $config);
            if (false !== $Database->create()) {
                $tab = array('id' => 0, 'start' => 0);
                $this->success('初始化成功！', '', array('tables' => $tables, 'tab' => $tab));
            } else {
                $this->error('初始化失败，备份文件创建失败！');
            }


        } elseif (IS_GET && is_numeric($id) && is_numeric($start)) { //备份数据
            $tables = session('backup_tables');
            //备份指定表
            $Database = new Database(session('backup_file'), session('backup_config'));
            $start = $Database->backup($tables[$id], $start);
            if (false === $start) { //出错
                $this->error('备份出错！');
            } elseif (0 === $start) { //下一表
                if (isset($tables[++$id])) {
                    $tab = array('id' => $id, 'start' => 0);
                    $this->success('备份完成！', '', array('tab' => $tab));
                } else { //备份完成，清空缓存
                    unlink(session('backup_config.path') . 'backup.lock');
                    session('backup_tables', null);
                    session('backup_file', null);
                    session('backup_config', null);
                    addlog('备份完成！');
                    $this->success('备份完成！');
                }
            } else {
                $tab = array('id' => $id, 'start' => $start[0]);
                $rate = floor(100 * ($start[0] / $start[1]));
                $this->success("正在备份...({$rate}%)", '', array('tab' => $tab));
            }

        } else { //出错
            $this->error('参数错误！');
        }
    }


    //显示修复数据库表格页面
    public function recovery()
    {
        //判断目录是否存在
        is_writeable(C("DB_PATH")) || mkdir('./' . C("DB_PATH_NAME") . '', 0777, true);
        /*
         * 列出备份文件列表
         * FilesystemIterator:文件迭代器
         * $path:D:\wamp\www\onexplorer\db
         * $flag:256
         * $glob:对象数组
         * realpath:返回函数的绝对地址
         */
        $path = realpath(C('DB_PATH'));
        $flag = \FilesystemIterator::KEY_AS_FILENAME;
        $glob = new \FilesystemIterator($path, $flag);

        $list = array();
        foreach ($glob as $name => $file) {
            if (preg_match('/^\d{8,8}-\d{6,6}-\d+\.sql(?:\.gz)?$/', $name)) {

                /*sscanf,按照指定格式解析一个字符串
                 * array (size=7)
                      0 => string '2016' (length=4)年
                      1 => string '09' (length=2)月
                      2 => string '14' (length=2)日
                      3 => string '09' (length=2)小时
                      4 => string '21' (length=2)分
                      5 => string '49' (length=2)秒
                      6 => int 1  part
                 * */
                $name = sscanf($name, '%4s%2s%2s-%2s%2s%2s-%d');
                $date = "{$name[0]}-{$name[1]}-{$name[2]}";
                $time = "{$name[3]}:{$name[4]}:{$name[5]}";
                $part = $name[6];

                if (isset($list["{$date} {$time}"])) {
                    $info = $list["{$date} {$time}"];
                    $info['part'] = max($info['part'], $part);
                    $info['size'] = $info['size'] + $file->getSize();
                } else {
                    $info['part'] = $part;
                    $info['size'] = $file->getSize();
                }
                /*
                 * pathinfo($file->getFilename()):
                 *    'dirname' => string '.' (length=1)
                      'basename' => string '20160914-092149-1.sql.gz' (length=24)
                      'extension' => string 'gz' (length=2)
                      'filename' => string '20160914-092149-1.sql' (length=21)
                 * */
                $extension = strtoupper(pathinfo($file->getFilename(), PATHINFO_EXTENSION));

                $info['compress'] = ($extension === 'SQL') ? '-' : $extension;
                $info['time'] = strtotime("{$date} {$time}");

                $list["{$date} {$time}"] = $info;
            }
        }
       /*
        *  '2016-09-14 09:21:49' =>
                array (size=4)
                  'part' => int 1
                  'size' => int 647
                  'compress' => string 'GZ' (length=2)
                  'time' => int 1473816109
           '2016-09-14 09:41:42' =>
                array (size=4)
                  'part' => int 1
                  'size' => int 760
                  'compress' => string 'GZ' (length=2)
                  'time' => int 1473817302
       * */
        $this->assign('list', $list);
        $this->display();
    }


    /**
     * 删除备份文件
     * @param  Integer $time 备份时间
     */
    public function del($time = 0)
    {
        if ($time) {
            $name = date('Ymd-His', $time) . '-*.sql*';
            $path = realpath(C('DB_PATH')) . DIRECTORY_SEPARATOR . $name;
            //glob:返回匹配指定模式的文件名或者目录
            array_map("unlink", glob($path));
            if (count(glob($path))) {
                $this->success('备份文件删除失败，请检查权限！');
            } else {
                addlog('备份文件删除成功！');
                $this->success('备份文件删除成功！');
            }
        } else {
            $this->error('参数错误！');
        }
    }


    /**
     * 还原数据库
     */
    public function import($time = 0, $part = null, $start = null)
    {
        if (is_numeric($time) && is_null($part) && is_null($start)) { //初始化
            //获取备份文件信息
            $name = date('Ymd-His', $time) . '-*.sql*';
            $path = realpath(C('DB_PATH')) . DIRECTORY_SEPARATOR . $name;
            $files = glob($path);

            $list = array();
            foreach ($files as $name) {
                //返回路径中带有路径名的部分
                $basename = basename($name);
                $match = sscanf($basename, '%4s%2s%2s-%2s%2s%2s-%d');
                $gz = preg_match('/^\d{8,8}-\d{6,6}-\d+\.sql.gz$/', $basename);
                /*
                 * name=D:\wamp\www\onexplorer\db\20160914-094142-1.sql.gz
                   match: 0=2016    1=09  2=14  3=09
                    4=41      5=42  6=1   gz=1
                */
                $list[$match[6]] = array($match[6], $name, $gz);
            }


            //ksort() 函数对关联数组按照键名进行升序排序。
            ksort($list);

            /*检测文件正确性，输出数组的最后一个元素
            last=array (
                  0 => 1,
                  1 => 'D:\\wamp\\www\\onexplorer\\db\\20160914-100144-1.sql.gz',
                  2 => 1,
              )
            */
            $last = end($list);


            if (count($list) === $last[0]) {
                session('backup_list', $list); //缓存备份列表
                $this->success('初始化完成！', '', array('part' => 1, 'start' => 0));
            } else {
                $this->error('备份文件可能已经损坏，请检查！');
            }
        } elseif (is_numeric($part) && is_numeric($start)) {
            $list = session('backup_list');
            $db = new Database($list[$part], array(
                'path' => realpath(C('DB_PATH')) . DIRECTORY_SEPARATOR,
                'compress' => $list[$part][2]
            ));


            $start = $db->import($start);

            if (false === $start) {
                $this->error('还原数据出错！');
            } elseif (0 === $start) { //下一卷
                if (isset($list[++$part])) {
                    $data = array('part' => $part, 'start' => 0);
                    $this->success("正在还原...#{$part}", '', $data);
                } else {
                    session('backup_list', null);
                    addlog('还原完成！');
                    $this->success('还原完成！');
                }
            } else {
                $data = array('part' => $part, 'start' => $start[0]);
                if ($start[1]) {
                    $rate = floor(100 * ($start[0] / $start[1]));
                    $this->success("正在还原...#{$part} ({$rate}%)", '', $data);
                } else {
                    $data['gz'] = 1;
                    $this->success("正在还原...#{$part}", '', $data);
                }
            }

        } else {
            $this->error('参数错误！');
        }
    }


}
