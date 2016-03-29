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
    public function select()
    {
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
        $condition['id'] = array('eq', 100);//表达式查询id=100
        $condition['name'] = array('like', 'thinkphp%');//模糊查询
        $condition['id'] = array('between', array('1', '8'));//等效id BETWEEN 1 AND 8
        $data = $user->where($condition)->find();
        //数组查询结束
        //快捷查询开始
        $User = M("User"); // 实例化User对象
        $map['name|title'] = 'thinkphp';
        // 把查询条件传入查询方法
        $map['status&score&title'] = array('1', array('gt', '0'), 'thinkphp', '_multi' => true);
        //'_multi'=>true必须加在数组的最后，表示当前是多条件匹配
        //等价于 status= 1 AND score >0 AND  title = 'thinkphp'
        //快捷查询方式中“|”和“&”不能同时使用
        //区间查询
        $map['id'] = array(array('gt', 3), array('lt', 10), 'or');
        //等价于(`id` > 3) OR (`id` < 10)
        $User->where($map)->select();//name= 'thinkphp' OR title = 'thinkphp'
        //快捷查询结束
        //复合查询
        $where['name'] = array('like', '%thinkphp%');
        $where['title'] = array('like', '%thinkphp%');
        $where['_logic'] = 'or';
        $map['_complex'] = $where;//插入的复合查询条件数组
        $map['id'] = array('gt', 1);
        //等价于
        //( id > 1) AND ( ( name like '%thinkphp%') OR ( title like '%thinkphp%') )
        //复合查询结束
        //统计查询开始
        $User = M("User"); // 实例化User对象
        // 获取用户数：
        $userCount = $User->count();
        // 或者根据字段统计：
        $userCount = $User->count("id");
        // 获取用户的最大积分：
        $maxScore = $User->max('score');
        //统计查询结束
        //分页，page第一个参数是页数，第二个参数是每页的数据数目
        $this->page(5, 25)->select();
        if ($data) {
            $this->success('成功');
            die();
        } else {
            $this->error('失败');
            die();
        }
    }
    /*
    * 获取数据
    * dingChao
    * 2016/3/29
    */
    public function data(){
        echo I('get.id',0); // 如果不存在$_GET['id'] 则返回0
        echo I('get.name',''); // 如果不存在$_GET['name'] 则返回空字符串
        // 采用htmlspecialchars方法对$_GET['name'] 进行过滤，如果不存在则返回空字符串
        echo I('get.name','','htmlspecialchars');//最后一个参数是过滤方法
        // 获取整个$_GET 数组
        //I方法可以过滤绝大多数参数
        I('get.');
        I('post.name','','htmlspecialchars'); // 采用htmlspecialchars方法对$_POST['name'] 进行过滤，如果不存在则返回空字符串
        I('session.user_id',0); // 获取$_SESSION['user_id'] 如果不存在则默认为0
        I('cookie.'); // 获取整个 $_COOKIE 数组
        I('server.REQUEST_METHOD'); // 获取 $_SERVER['REQUEST_METHOD']
    }
}