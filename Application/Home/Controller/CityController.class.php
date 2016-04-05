<?php
/**
 * 空操作
 * User: dingChao
 * Date: 2016/3/30
 * Time: 16:24
 */
namespace Home\Controller;
use Think\Controller;

class CityController extends Controller{
    /*
    * 空操作
    * dingChao
    * 2016/3/30
    */
    //空操作方法仅在你的控制器类继承系统的Think\Controller类才有效。
    public function _empty($name){
        //把所有城市的操作解析到city方法
        $this->city($name);
    }
    //city方法 本身是 protected 方法
    protected function city($name){
        //和$name这个城市相关的处理
        echo '当前城市' . $name;
    }
}