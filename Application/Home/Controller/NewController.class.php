<?php
/**
 *
 * User: dingChao
 * Date: 2016/3/29
 * Time: 15:29
 */
namespace Home\Controller;
use Think\Controller;

class NewController extends Controller{
    public function index(){
        echo I('path.1'); // 输出2013
        echo I('path.2'); // 输出06
        echo I('path.3'); // 输出01
        // 采用正则表达式进行变量过滤
        I('get.name','','/^[A-Za-z]+$/');
        I('get.id',0,'/^\d+$/');
        //变量修饰符
        I('get.id/d');//强制转换为整形
        I('post.name/s');//强制转换为字符串型
        I('post.ids/a');//强制转换为数组类型
    }
}