<?php
/**
 * 空控制器
 * User: dingChao
 * Date: 2016/3/30
 * Time: 16:43
 */

namespace Home\Controller;
use Think\Controller;

class EmptyController extends Controller{
    // 初始化方法
    public function _initialize(){
        echo 'initialize<br/>';
    }
    public function index(){
        //根据当前控制器名来判断要执行那个城市的操作
        $cityName = CONTROLLER_NAME;
        $this->city($cityName);
    }
    // city方法 本身是 protected 方法
    protected function city($name){
        //和$name这个城市相关的处理
        echo '当前城市' . $name;
    }

    //前置操作方法\
    public function _before_test(){
        echo 'before<br/>';
    }
    public function test(){
        echo 'index<br/>';
    }
    //后置操作方法
    public function _after_test(){
        echo 'after';
    }
}