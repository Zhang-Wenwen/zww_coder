<?php
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $this->show();
    }

    public function login()
    {
        if (isset($_POST['in'])) {
            $username = I('post.user');
            $password = I('post.pwd');
            $password = md5(md5("$password"));
            if (!$username || !$password) {
                $this->error('请将表单填写完整');
            }
            $user = M('user');
            $w['username'] = $username;
            $arr = $user->field('id,password')->where($w)->find();
            $id = $arr['id'];
            if ($arr['password'] == $password) {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
                //cookie('user', '$username', 3600);
                //cookie('id', '$id', 3600);
                $this->success('用户登录成功', U('Index/index'));
            } else {
                $this->error('该用户不存在或密码错误');
            }

        } else {
            $this->display('log1');
        }
    }
}