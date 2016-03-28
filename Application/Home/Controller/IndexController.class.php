<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $Data = M('Data');
        $name = $Data -> find('1');
        $this->assign('name',$name['data']);
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