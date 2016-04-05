<?php
namespace User\controller;
use Think\Controller;

class IndexController extends Controller{
    public function test($name = 'yuanshou'){
        echo 'hell'.$name;
    }
}