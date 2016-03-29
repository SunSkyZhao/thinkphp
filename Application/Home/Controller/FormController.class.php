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
        //查询某一字段的值
//        $form = M('form')->where('id='.$id)->getField('title');
        if($data){
            $this->assign('data',$data);
        }else{
            $this->error('数据错误');
        }
        $this->display();
    }
    /*
    * 编辑页面
    * dingChao
    * 2016/3/28
    */
    public function edit($id = 0){
        $form = M('form');
        $data = $form->find($id);
        $this->assign('vo',$data);
        $this->display();
    }
    /*
    * 更新操作
    * dingChao
    * 2016/3/28
    */
    public function update(){
        $form = D('form');
        if($form->create()){
            $result = $form->save();
            if($result){
                $this->success('成功');
            }else{
                $this->error('失败');
            }
        }else{
            $this->error($form->getError());
        }
        //不依靠表单，内部数据处理
//        $Form = M("Form");
//        // 要修改的数据对象属性赋值
//        $data['id'] = 5;
//        $data['title'] = 'ThinkPHP';
//        $data['content'] = 'ThinkPHP3.2.3版本发布';
//        $Form->save($data); // 根据条件保存修改的数据
        //只更改某一字段
//        $Form = M("Form");
//        // 更改title值
//        $Form->where('id=5')->setField('title','ThinkPHP');
//        $User = M("User"); // 实例化User对象
//        $User->where('id=5')->setInc('score'); // 用户的积分加1
//        $User->where('id=5')->setDec('score',5); // 用户的积分减5
    }
    /*
    * 删除数据
    * dingChao
    * 2016/3/28
    */
    public function delete($id=0){
        $form = M('form');
        $form->delete($id);
    }
    /*
    * 查询数据库
    * dingChao
    * 2016/3/29
    */
    public function select(){
        $user = M('form');
        //字符串查询开始
        //二维数组
        $data = $user->where('id = 1')->select();
        //一维数组
        $data = $user->where('id = 1')->find();
        //字符串查询结束
        //数组查询开始(不支持二维数组)
        $condition['name'] = '123';
        $condition['title'] = '123';
        $condition['id'] = '123';
        $condition['_logic'] = 'OR';//逻辑语句，等同name=123 or title=123
        $condition['id']  = array('eq',100);//表达式查询id=100
        $condition['name'] = array('like','thinkphp%');//模糊查询
        $condition['id']  = array('between',array('1','8'));//等效id BETWEEN 1 AND 8
        $data = $user->where($condition)->find();
        //数组查询结束
        $User = M("User"); // 实例化User对象
        $map['name|title'] = 'thinkphp';
        // 把查询条件传入查询方法
        $User->where($map)->select();//name= 'thinkphp' OR title = 'thinkphp'
        //快捷查询开始

        //快捷查询结束
        if($data){
            $this->success('成功');
            die();
        }else{
            $this->error('失败');
            die();
        }
    }
}