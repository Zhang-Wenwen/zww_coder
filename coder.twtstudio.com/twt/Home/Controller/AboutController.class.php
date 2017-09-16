<?php
namespace Home\Controller;

use Think\Controller;

class AboutController extends Controller
{
    public function index()
    {
    	$user=M('about');
        $cont=$user->where('id=1')->find();
        $this->assign('first_col',$cont['first_col']);
        $this->assign('sec_col',$cont['sec_col']);
        $this->assign('third_col',$cont['third_col']);
       
        $this->display();
    }


}