<?php
return array(
// 添加数据库配置信息(要放在相应的模块下)
    'DB_TYPE'=>'mysql',// 数据库类型
    'DB_HOST'=>'127.0.0.1',// 服务器地址
    'DB_NAME'=>'test',// 数据库名
    'DB_USER'=>'root',// 用户名
    'DB_PWD'=>'',// 密码
    'DB_PORT'=>3306,// 端口
    'DB_PREFIX'=>'think_',// 数据库表前缀
    'DB_CHARSET'=>'utf8',// 数据库字符集
//视图配置
//    'DEFAULT_V_LAYER'       =>  'Template',//配置视图所在目录
//    'TMPL_TEMPLATE_SUFFIX'=>'.tpl'//配置试图文件的后缀名
//    'TMPL_FILE_DEPR'=>'_'//将view文件夹从视图目录中去点，形成Home/User_index这样的目录结构
    //参数设置
//    'URL_PARAMS_BIND_TYPE'  =>  1, // 设置参数绑定按照变量顺序绑定
    //如果不按照顺序绑定，/id/1/type/2访问的效果和type/2/id/1是一样的
//    'URL_PARAMS_BIND'       =>  false //关闭参数绑定，不会再传参数，将不会获取到get值
//默认错误跳转对应的模板文件
//    'TMPL_ACTION_ERROR' => THINK_PATH . 'Tpl/dispatch_jump.tpl',
//默认成功跳转对应的模板文件
//    'TMPL_ACTION_SUCCESS' => THINK_PATH . 'Tpl/dispatch_jump.tpl',
//    'TMPL_ACTION_SUCCESS' => 'Common@Public/
//操作绑定到类(暂时没发现有什么卵用，开启之后寻址url会不一样)
//    'ACTION_BIND_CLASS'    =>    True,
);