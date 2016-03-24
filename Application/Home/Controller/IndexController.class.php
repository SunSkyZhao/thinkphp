<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        echo 'hello,thinkphp!';
//        $this->hello2();
    }

    protected function hello2(){
        echo '只是protected方法!';
    }
}