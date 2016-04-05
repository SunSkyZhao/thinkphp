<?php
/**
 * 跳转和重定向
 * User: dingChao
 * Date: 2016/4/5
 * Time: 9:44
 */
namespace Home\Controller;
use Think\Controller;

class RedirectController extends Controller{
    public function index(){
        $url = 'thinkphp/Home/Redirect/next';
//        $this->success('123',$url);
        $this->redirect('Redirect/next', 'cate_id=2&status=1', 5,'页面跳转中...');
    }

    public function next(){
        echo '456';
    }
}