<?php
namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{
    Public function _initialize()
    {
        // 初始化的时候检查用户权限
        if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
            $this->error('请登录', '/admin.php/home/login/login', 1);
        }
    }
}

?>