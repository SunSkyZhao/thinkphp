<?php
/**
 *
 * User: dingChao
 * Date: 2016/3/28
 * Time: 10:08
 */
namespace Home\Controller;
use Think\Controller;

class FormController extends Controller{
    public function add(){
        $this->display();
    }
    /*
    * 插入数据方法
    * dingChao
    * 2016/3/28
    */
    public function insert(){
        $form = D('Form');
        //用到model插入数据开始
        //使用model验证数据合法或改动数据，无参数则使用post的值
        if($form -> create()){
            //将数据添加进数据库
            $result = $form->add();
            if($result){
                $this->success('成功');
            }else{
                $this->error('失败');
            }
        }else{
            $this->error($form->getError());
        }
        //使用model方法插入结束
        //使用内部操作插入开始，完全信任数据
//        $Form   =   D('Form');
//        $data['title']  =   'ThinkPHP';
//        $data['content']    =   '表单内容';
//        $Form->add($data);
        //对象操作开始，对象操作不需要插入数据
//        $Form   =   D('Form');
//        $Form->title  =   'ThinkPHP';
//        $Form->content    =   '表单内容';
//        $Form->add();
        //对象操作结束
        //内部操作结束
    }
    /*
    * 读取数据
    * dingChao
    * 2016/3/28
    */
    public function read($id = 0){
        $form = M('form');
        $data = $form->find($id);
        if($data){
            $this->assign('data',$data);
        }else{
            $this->error('数据错误');
        }
        $this->display();
    }
}