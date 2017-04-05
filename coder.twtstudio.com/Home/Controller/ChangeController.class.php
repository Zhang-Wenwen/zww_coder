<?php
namespace Home\Controller;

use Think\Controller;

class ChangeController extends CommonController
{
    public function index()
    {
        $this->show('Change/reg');
    }

    public function change()
    {

        if (isset($_POST['c'])) {
            $id = $_SESSION['id'];
            $username = $_SESSION['username'];
            $password = I('post.pwd1');
            $again = I('post.pwd3');
            $data1['username'] = I('post.user1');
            $data2['password'] = md5(md5(I('post.pwd2')));
            if (!$username || !$password || !$data2['password']) {

                $this->error('请将表单填写完整');
            }
            $user = M('user');
            $w['username'] = $username;
            $arr = $user->field('id,password')->where($w)->find();
            if ($arr['password'] == md5(md5($password))) {
                if ($again == I(('post.pwd2'))) {
                    $user->where($w)->save($data2);
                } else {
                    $this->error('两次输入不一致');
                }
                if ($data1['username']) {
                    $user->where($w)->save($data1);
                }
                $this->success('用户修改成功', U('Login/login'));
            } else {
                $this->error('该用户名或密码错误');
            }
        } else {
            $this->display('reg');
        }

    }


}