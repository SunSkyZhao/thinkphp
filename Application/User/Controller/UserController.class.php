<?php
/**
 * 用户的业务逻辑和调度
 * User: dingChao
 * Date: 2016/4/5
 * Time: 10:18
 */

namespace  User\Controller;
use  Think\Controller;

class UserController extends Controller{
    public function login(){
        $event = new \User\Event\UserEvent();
        $event->login();
    }

    public function register(){
        if(IS_POST){
            $User = D("User"); // 实例化User对象
            $rules = array(
                array('name','require','用户名必须！'), // 用户名必须
                array('name','','帐号名称已经存在！',1,'unique',1), // 验证用户名是否已经存在
                array('email','email','Email格式错误！',2), // 如果输入则验证Email格式是否正确
                array('password','6,30','密码长度不正确',0,'length'), // 验证密码是否在指定长度范围
                array('repassword','password','确认密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
            );
            if (!$User->create()){
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                exit($User->getError());
            }else{
                // 验证通过 可以进行其他数据操作
                $User->add();
            }
        }else{
            $this->display();
        }
    }
}