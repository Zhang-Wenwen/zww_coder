<?php

namespace Home\Controller;

use Think\Controller;

use Think\Upload;

use \Think\Page;

use Think\Image;

use Think\UploadFile;

use Think\jcrop_image;

class TeamController extends CommonController{

  

	public function index(){

 $content=$this->fetch('Team/add_member');

        $this->show($content);



	}

    public function frontpage(){

        $this->show();

    }

    public function see_photo(){

         

         $photo_loc=$_GET['photo_loc'];

         $this->assign('loc',$photo_loc);

         $this->display();

    }

    public function member_table(){



       $user=M('teamer');

       $all_grade=$user->where('is_new_grade=1')->field('teamer_grade')->select();

        $cnt =$user->where('is_new_grade=1')->count();



    for ($i = 0; $i < $cnt; $i++) {

        for ($j = 0; $j < $cnt - $i - 1; $j++) {

            if ($all_grade[$j]['teamer_grade'] > $all_grade[$j+1]['teamer_grade']) {

                $temp = $all_grade[$j]['teamer_grade'];

                $all_grade[$j]['teamer_grade'] = $all_grade[$j+1]['teamer_grade'];

                $all_grade[$j+1]['teamer_grade'] = $temp;

            }

        }

    }

      $this->assign('all_grade',$all_grade);

      $this->assign('cnt',$cnt);

        $grade= $_GET['grade'];

        if($grade=='')  $grade=2013;

        $count      = $user->where("teamer_grade = $grade")->count();// 查询满足要求的总记录数

        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录???25)

        $show       = $Page->show();// 分页显示输出

        $list = $user->where("teamer_grade = $grade")->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);// 赋值数据集

        $this->assign('page',$show);// 赋值分页输???
        $this->assign('total',$count);

        $this->assign('i',0);

        $this->display(); // 输出模板

    }

	/*public function showinfo(){

         $admin=M('tp_teamer_admin','','mysql://root:@localhost/coder');

        $a=$admin->where('id=1')->find();



        $this->assign('show_how',$a); 

		$user=M('tp_teamer');



        $grade= $_GET['grade'];

        if($grade=='')  $grade=2013;

        $count      = $user->where("teamer_grade = $grade")->count();// 查询满足要求的总记录数

        $Page       = new Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录???25)

        $show       = $Page->show();// 分页显示输出

        $list = $user->where("teamer_grade = $grade")->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);// 赋值数据集

        $this->assign('page',$show);// 赋值分页输???
        $this->display(); // 输出模板

	

	}*/

    public function getele(){

        $user=M('teamer');

        $all_grade=$user->where('is_new_grade=1')->field('teamer_grade')->select();

        $cnt =$user->where('is_new_grade=1')->count();

        $label=1;

        for($i=0;$i<$cnt;$i++){

            if($all_grade[$i]['teamer_grade']==$_POST['teamer_grade']) {

                $label=0;

                break;

            }

        }

        if($label==1) $teamer['is_new_grade']=1;

        else $teamer['is_new_grade']=0;

        $upload = new Upload();

        $upload->maxSize=3145728;

        $upload->exts=array('jpg','jpeg','gif','png');

        $upload->rootPath  = './Public';

        $upload->savePath='/Images/TeamPic';

        $info=$upload->upload();

        if(!$info){

            $this->error($upload->getError());

        }else {

            foreach($info as $file){

                $teamer['teamer_photo_loc']= $file['savepath'].$file['savename'];

            }

        }

        $teamer['teamer_name']=$_POST['teamer_name'];

        $teamer['teamer_grade']=$_POST['teamer_grade'];

        $teamer['teamer_school']=$_POST['teamer_school'];

        $teamer['teamer_group']=$_POST['teamer_group'];

        $teamer['teamer_go']=$_POST['teamer_go'];
        $teamer['teamer_mainpage_link']=$_POST['teamer_mainpage_link'];

        $user->add($teamer);



       

  

             $content=$this->fetch('Team/add_member');

        $this->show($content);

    



    }

	public function dinfo(){

		$user=M('teamer');

	    $id= $_GET['teamer_id'];

        $the_ele=$user->where("id=$id")->find();

        

       $user->where("id=$id")->delete();

       $see=$user->where("teamer_grade=$the_ele[teamer_grade]")->select();

        $contain=count($see);

        if($contain>0) {

            $set['id']=$see[0]['id'];

            $set['is_new_grade']=1;

            $user->save($set);

        }

    

       $all_grade=$user->where('is_new_grade=1')->field('teamer_grade')->select();

        $cnt =$user->where('is_new_grade=1')->count();



    for ($i = 0; $i < $cnt; $i++) {

        for ($j = 0; $j < $cnt - $i - 1; $j++) {

            if ($all_grade[$j]['teamer_grade'] > $all_grade[$j+1]['teamer_grade']) {

                $temp = $all_grade[$j]['teamer_grade'];

                $all_grade[$j]['teamer_grade'] = $all_grade[$j+1]['teamer_grade'];

                $all_grade[$j+1]['teamer_grade'] = $temp;

            }

        }

    }

      $this->assign('all_grade',$all_grade);

      $this->assign('cnt',$cnt);

        $grade= $_GET['grade'];

        if($grade=='')  $grade=2013;

        $count      = $user->where("teamer_grade = $grade")->count();// 查询满足要求的总记录数

        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录???25)

        $show       = $Page->show();// 分页显示输出

        $list = $user->where("teamer_grade = $grade")->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);// 赋值数据集

        $this->assign('page',$show);// 赋值分???输??
        $this->assign('total',$count);

        $this->assign('i',0);

            $content=$this->fetch('Team/member_table');

        $this->show($content);

	}

	public function updateinfo(){



        $user=M('teamer');

        $id= $_GET['teamer_id'];

        $ele = $user->where("id = $id")->select();

        $this->assign('ele',$ele);

         $content=$this->fetch('Team/update_member');

        $this->show($content);



          



    }

    public function saveinfo(){

         $user=M('teamer');

        $id= $_GET['teamer_id'];

      /*   $upload = new Upload();

        $upload->maxSize=3145728;

        $upload->exts=array('jpg','jpeg','gif','png');

       $upload->rootPath  = './Public';

        $upload->savePath='/Images/TeamPic';

        $info=$upload->upload();

        if(!$info){

        //  $this->error($upload->getError());

        }else {

            foreach($info as $file){

                $teamer['teamer_photo_loc']= $file['savepath'].$file['savename'];

            }

        }*/

        $maxSize = 1024 * 1024; //1M 设置附件上传大小

$allowExts = array("gif", "jpg", "jpeg", "png"); // 设置附件上传类型

$file_save = "upload/";



$upload = new UploadFile(); // 实例化上传类

$upload->maxSize = $maxSize;

$upload->allowExts = $allowExts;

$upload->savePath = $file_save; // 设置附件

$upload->saveRule = time() . sprintf('%04s', mt_rand(0, 1000));

if (!$upload->upload()) {// 上传错误提示错误信息

  /*  $errormsg = $upload->getErrorMsg();

    $arr = array(

        'error' => $errormsg, //返回错误

    );

    echo json_encode($arr);

   exit;*/

} else {// 上传成功 获取上传文件信息

    $info = $upload->getUploadFileInfo();



    

    $imgurl = $info[0]['savename'];

    

    $x = $_POST['x1'];

    $y = $_POST['y1'];

    $x2 = $_POST['x2'];

    $y2 = $_POST['y2'];

    $w = $_POST['w'];

    $h = $_POST['h'];

    //include_once("jcrop_image.class.php");   

    $file_save = "http://coder.twtstudio.com/upload/";

    $file_save1 = "upload/";

    $pic_name = $file_save . $imgurl;            

   // $crop = new jcrop_image($file_save1, $pic_name, $x, $y, $w, $h, $w, $h);

   // $file = $crop->crop();

     $image=new Image();

   $image->open("./upload/".$imgurl);

 

   $image->crop($h,$w,$x,$y)->save("./upload/$imgurl.'b'");



       

         $teamer['teamer_photo_loc']= "$imgurl.'b'";}

        



        $teamer['id']=$id;

        $new_grade=$_POST['teamer_grade'];

        $old_grade=$user->where("id=$id")->find();

        if($new_grade!=$old_grade['teamer_grade']){


        $all_grade=$user->where('is_new_grade=1')->field('teamer_grade')->select();

        $cnt =$user->where('is_new_grade=1')->count();

        $label=1;

        for($i=0;$i<$cnt;$i++){

            if($all_grade[$i]['teamer_grade']==$new_grade) {

                $label=0;

                break;

            }

        }

        if($label==1) $teamer['is_new_grade']=1;

        else $teamer['is_new_grade']=0;

        }
        $teamer['teamer_name']=$_POST['teamer_name'];

        $teamer['teamer_grade']=$_POST['teamer_grade'];

        $teamer['teamer_group']=$_POST['teamer_group'];

        $teamer['teamer_school']=$_POST['teamer_school'];  
        
        $teamer['teamer_go']=$_POST['teamer_go'];
        $user->save($teamer);

        if($old_grade['is_new_grade']==1){
        $see=$user->where("teamer_grade=$old_grade[teamer_grade]")->select();

        $contain=count($see);

        if($contain>0) {

            $set['id']=$see[0]['id'];

            $set['is_new_grade']=1;

            $user->save($set);

        }
        }




        /*显示先前页面*/

       $all_grade=$user->where('is_new_grade=1')->field('teamer_grade')->select();

        $cnt =$user->where('is_new_grade=1')->count();



    for ($i = 0; $i < $cnt; $i++) {

        for ($j = 0; $j < $cnt - $i - 1; $j++) {

            if ($all_grade[$j]['teamer_grade'] > $all_grade[$j+1]['teamer_grade']) {

                $temp = $all_grade[$j]['teamer_grade'];

                $all_grade[$j]['teamer_grade'] = $all_grade[$j+1]['teamer_grade'];

                $all_grade[$j+1]['teamer_grade'] = $temp;

            }

        }

    }

      $this->assign('all_grade',$all_grade);

      $this->assign('cnt',$cnt);

        $grade= $_GET['grade'];

        if($grade=='')  $grade=2013;

        $count      = $user->where("teamer_grade = $grade")->count();// 查询满足要求的总记录数

        $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录???25)

        $show       = $Page->show();// 分页显示输出

        $list = $user->where("teamer_grade = $grade")->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);// 赋值数据集

        $this->assign('page',$show);// 赋值分页输???
        $this->assign('total',$count);

        $this->assign('i',0);

    

      $content=$this->fetch('Team/member_table');

        $this->show($content);

    

    }

   /* public function searchinfo(){

        $user=M('teamer');

        $search=$_POST['search'];

        echo $search;

        $keyword=$_POST['keyword'];

        $condition;

        if($search==1)   $condition="teamer_name = $keyword";

        if($search==2)   $condition="teamer_grade = $keyword";

        if($search==3)   $condition="teamer_group = $keyword";

        if($search==4)   $condition="teamer_school = $keyword";

        $count      = $user->where($condition)->count();



        $Page       = new Page($count,3);

        $show       = $Page->show();// 分页显示输出

        $list = $user->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);// 赋值数据集

        $this->assign('page',$show);

        var_dump($list);

        $content=$this->fetch('Team/showinfo');

        $this->show($content); 

    }

  */

     public function show_update(){

         $admin=M('teamer_admin');

        $a=$admin->where('id=1')->find();



        $this->assign('show_how',$a);

       $content=$this->fetch('Team/show_control');

        $this->show($content); 

     }

     public function show_save(){

        $admin=M('teamer_admin');

        $a['id']=1;

        $a['show_num']=$_POST['new_num'];

        $a['show_grade']=$_POST['new_grade'];

        $admin->save($a);

        $this->assign('show_how',$a);

        $this->assign('state','设置成功');

           $content=$this->fetch('Team/show_control');

        $this->show($content);

        

     }

     public function getele2(){

         header("Content-type: text/html; charset=utf-8");

          $user=M('teamer');

        $all_grade=$user->where('is_new_grade=1')->field('teamer_grade')->select();

        $cnt =$user->where('is_new_grade=1')->count();

        $label=1;

        for($i=0;$i<$cnt;$i++){

            if($all_grade[$i]['teamer_grade']==$_POST['teamer_grade']) {

                $label=0;

                break;

            }

        }

        if($label==1) $teamer['is_new_grade']=1;

        else $teamer['is_new_grade']=0;

$maxSize = 2048 * 1024; //1M 设置附件上传大小

$allowExts = array("gif", "jpg", "jpeg", "png"); // 设置附件上传类型

$file_save = "upload/";

//include_once("UploadFile.class.php");

$upload = new UploadFile(); // 实例化上传类

$upload->maxSize = $maxSize;

$upload->allowExts = $allowExts;

$upload->savePath = $file_save; // 设置附件

$upload->saveRule = time() . sprintf('%04s', mt_rand(0, 1000));

if (!$upload->upload()) {// 上传错误提示错误信息

    $errormsg = $upload->getErrorMsg();

    $arr = array(

        'error' => $errormsg, //返回错误

    );

    echo json_encode($arr);

    exit;

} else {// 上传成功 获取上传文件信息

    $info = $upload->getUploadFileInfo();



    

    $imgurl = $info[0]['savename'];

    

    $x = $_POST['x1'];

    $y = $_POST['y1'];

    $x2 = $_POST['x2'];

    $y2 = $_POST['y2'];

    $w = $_POST['w'];

    $h = $_POST['h'];

    //include_once("jcrop_image.class.php");   

    $file_save = "http://coder.twtstudio.com/upload/";

    $file_save1 = "upload/";

    $pic_name = $file_save . $imgurl;            

   // $crop = new jcrop_image($file_save1, $pic_name, $x, $y, $w, $h, $w, $h);

   // $file = $crop->crop();

     $image=new Image();

   $image->open("./upload/".$imgurl);

 

   $image->crop($h,$w,$x,$y)->save("./upload/$imgurl.'b'");

   $teamer['teamer_name']=$_POST['teamer_name'];

        $teamer['teamer_grade']=$_POST['teamer_grade'];

        $teamer['teamer_school']=$_POST['teamer_school'];

        $teamer['teamer_group']=$_POST['teamer_group'];

         $teamer['teamer_photo_loc']= "$imgurl.'b'";
           $teamer['teamer_go']=$_POST['teamer_go'];

        $teamer['teamer_mainpage_link']=$_POST['teamer_mainpage_link'];

        $user->add($teamer);



       

  

             $content=$this->fetch('Team/add_member');

        $this->show($content);

    





     

}

     }



} 