<?php

namespace Home\Controller;

use Think\Controller;

use Think\Upload;

use \Think\Page;

use Think\Image;

use Think\UploadFile;

use Think\jcrop_image;

class AboutController extends CommonController{

  

	public function index(){

 
        $user=M('about');
        $cont=$user->where('id=1')->find();
        $this->assign('first_col',$cont['first_col']);
        $this->assign('sec_col',$cont['sec_col']);
        $this->assign('third_col',$cont['third_col']);
        $this->display();



	}


     public function about_save(){

        $admin=M('about');

        $a['id']=1;

        $a['first_col']=$_POST['first'];

        $a['sec_col']=$_POST['sec'];
        $a['third_col']=$_POST['third'];

        $admin->save($a);
        $this->success('修改成功');
/*
        $this->assign('show_how',$a);

        $this->assign('state','设置成功');

           $content=$this->fetch('Team/show_control');

        $this->show($content);

       */ 

     }

     

 


} 