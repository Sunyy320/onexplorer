<?php
return array(
	//'配置项'=>'配置值'
    'SHOW_PAGE_TRACE'=>true,//开启页面Trace,易于调错

    'COOKIE_SALT' => '123', //设置cookie加密密钥

    //备份配置
    'DB_PATH_NAME' => 'db',        //备份目录名称,主要是为了创建备份目录
    'DB_PATH' => './db/',     //数据库备份路径必须以 / 结尾；
    'DB_PART' => '20971520',  //该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M
    'DB_COMPRESS' => '1',         //压缩备份文件需要PHP环境支持gzopen,gzwrite函数        0:不压缩 1:启用压缩
    'DB_LEVEL' => '9',         //压缩级别   1:普通   4:一般   9:最高

    'UPDATE_URL' => 'http://update.qd.qiawei.com/',
    'NEWS_URL' => 'http://qwadmin.qiawei.com/api/news/',
    'Version' => '1.1',
);