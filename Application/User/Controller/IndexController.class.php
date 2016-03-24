<?php
/**
 *
 * User: dingChao
 * Date: 2016/3/23
 * Time: 11:36
 */

namespace User\controller;
use Think\Controller;

class IndexController extends Controller{
    public function test($name = 'yuanshou'){
        echo 'hell'.$name;
    }
}