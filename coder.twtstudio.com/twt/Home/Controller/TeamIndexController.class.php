<?php
namespace Home\Controller;

use Think\Controller;
use Think\Upload;
use \Think\Page;

class TeamIndexController extends Controller
{
    public function index()
    {
        $content = $this->fetch();
        $this->show($content);

    }

    public function homepage()
    {
        $this->show();
    }

    public function getele()
    {
        $user = M('tp_teamer');
        //$ele=$user->where('id>1 and id<=70')->order('id desc,date asc')->select();
        $upload = new Upload();
        $upload->maxSize = 3145728;
        $upload->exts = array('jpg', 'jpeg', 'gif', 'png');
        $upload->savePath = './teamer_photo';
        $info = $upload->upload();
        if (!$info) {
            $this->error($upload->getError());
        } else {
            foreach ($info as $file) {
                $teamer['teamer_photo_loc'] = $file['savepath'] . $file['savename'];
            }
        }
        $teamer['teamer_name'] = $_POST['teamer_name'];
        $teamer['teamer_grade'] = $_POST['teamer_grade'];
        $teamer['teamer_group'] = $_POST['teamer_group'];
        $teamer['teamer_school'] = $_POST['teamer_school'];
        $user->add($teamer);
        $content = $this->fetch('Index/index');
        $this->show($content);

    }

    
    public function showinfo1()
    {


        $admin = M('teamer_admin');
        $a = $admin->where('id=1')->find();
        $page_num = $a['show_num'];

        $user = M('teamer');
        $grade = intval(I('get.grade'));
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

    for($i=0;$i<$cnt;$i++){
        $all_grade1[$i]=$all_grade[$i]['teamer_grade'];
    }

      $this->assign('show_grade',$all_grade1);

      $this->assign('grade_num',$cnt);

     
        if ($grade == '') $grade = 2014;
        $this->assign('cur_grade', $grade);
        $count = $user->where("teamer_grade = $grade")->count();// 查询满足要求的总记录数
        if($count==0){
        $grade = 2014;
        $this->assign('cur_grade', $grade);
        $count = $user->where("teamer_grade = $grade")->count();
        }
       /* $grades = explode("-", $a['show_grade']);
        $this->assign('show_grade', $grades);
        $grade_num = count($grades);
        $this->assign('grade_num', $grade_num);*/

        $Page = new Page($count, $page_num);
        $Page->setConfig('next', "<img src='http://coder.twtstudio.com/Public/Images/Frontend/next.png'>");
        $Page->setConfig('prev', "<img src='http://coder.twtstudio.com/Public/Images/Frontend/prev.png'>");

        $show = $Page->show();// 分页显示输出
        $list = $user->where("teamer_grade = $grade")->limit($Page->firstRow . ',' . $Page->listRows)->select();
       
        $this->assign('page_num', $page_num);
         $this->assign('check_group',0);
           $this->assign('cur_type',2);
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输
       $content=$this->fetch('TeamIndex/showinfo1');

        $this->show($content);
    }
    public function showinfo2(){

        $admin = M('teamer_admin');
        $a = $admin->where('id=1')->find();
        $page_num = $a['show_num'];

        $user = M('teamer');
     
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

    for($i=0;$i<$cnt;$i++){
        $all_grade1[$i]=$all_grade[$i]['teamer_grade'];
    }

      $this->assign('show_grade',$all_grade1);

      $this->assign('grade_num',$cnt);
      $grade = 2014;
       $this->assign('cur_grade', $grade);
       $this->assign('cur_type',1);

       $group =I('get.teamer_group');
       
       if($group=='')  $group = "'程序组'";
       
        $count = $user->where("teamer_group = $group")->count();
    
         if($count==0){
            if($group!="'程序组'"&&$group!="'设计组'"&&$group!="'产品组'"&&$group!="'前端组'")
        {
            $group = "'程序组'";
        
       $count = $user->where("teamer_group = '程序组' or teamer_group='移动组'")->count();
         }
        }

        $group_type=0;
        if($group=="'程序组'")  $group_type=1;
        else if($group=="'产品组'")  $group_type=2;
        else if($group=="'前端组'")  $group_type=3;
        else if($group=="'设计组'")  $group_type=4;
        $this->assign('check_group',$group_type);

      //  $list = $user->where("teamer_group = $group")->select();
       if($group=="'程序组'"){
       // $list = $user->where("teamer_group = '程序组' or teamer_group='移动组'")->select();
         $count = $user->where("teamer_group = '程序组' or teamer_group='移动组'")->count();
       }

       $Page = new Page($count, $page_num);
        $Page->setConfig('next', "<img src='http://coder.twtstudio.com/Public/Images/Frontend/next.png'>");
        $Page->setConfig('prev', "<img src='http://coder.twtstudio.com/Public/Images/Frontend/prev.png'>");

        $show = $Page->show();// 分页显示输出
if($group=="'程序组'"){
        $list = $user->where("teamer_group = '程序组' or teamer_group='移动组'")->limit($Page->firstRow . ',' . $Page->listRows)->select();
       
}else {
     $list = $user->where("teamer_group = $group")->limit($Page->firstRow . ',' . $Page->listRows)->select();
}
        $this->assign('page_num', $page_num);
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输
       $content=$this->fetch('TeamIndex/showinfo1');

        $this->show($content);

    }
}