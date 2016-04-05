<?php
/**
 * 用户事件的响应操作
 * User: dingChao
 * Date: 2016/4/5
 * Time: 10:18
 */

namespace  User\Event;
class UserEvent {
    // 用户登录事件
    public function login(){
        echo 'login event';
    }

    // 用户登出事件
    public function logout(){
        echo 'logout event';
    }
}