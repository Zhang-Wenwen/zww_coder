<?php
namespace Home\Controller;

use Think\Controller;

class LogoutController extends Controller
{
    public function index()
    {
        session('username', null);
        session('[destroy]'); // 销毁session
        // cookie(null); // 清空当前设定前缀的所有cookie值
        //session_unset();
        //session_destroy();
        //session注销
        $this->redirect('/Home/Login/login');
        //登出后，跳转回首页
    }


}