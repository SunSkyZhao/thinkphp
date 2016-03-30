<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $Data = M('form');
        $name = $Data -> where('1=1')-> select();
        $this->assign('data',$name);
        $this->display();
    }

    protected function hello2(){
        echo '只是protected方法!';
    }

    public function hello($name = 'fuck'){
        $this->assign('name',$name);
        $this->display();
    }
}