<?php
namespace Home\Controller;

use Think\Controller;
use Think\Upload;
use \Think\Page;

class AdminController extends Controller
{

    public function index()
    {
        $content = $this->fetch('Admin/add_member');
        $this->show($content);

    }

    public function frontpage()
    {
        $this->show();
    }

    public function member_table()
    {

        $user = M('tp_teamer');
        $all_grade = $user->where('is_new_grade=1')->field('teamer_grade')->select();
        $cnt = $user->where('is_new_grade=1')->count();

        for ($i = 0; $i < $cnt; $i++) {
            for ($j = 0; $j < $cnt - $i - 1; $j++) {
                if ($all_grade[$j]['teamer_grade'] > $all_grade[$j + 1]['teamer_grade']) {
                    $temp = $all_grade[$j]['teamer_grade'];
                    $all_grade[$j]['teamer_grade'] = $all_grade[$j + 1]['teamer_grade'];
                    $all_grade[$j + 1]['teamer_grade'] = $temp;
                }
            }
        }
        $this->assign('all_grade', $all_grade);
        $this->assign('cnt', $cnt);
        $grade = $_GET['grade'];
        if ($grade == '') $grade = 2013;
        $count = $user->where("teamer_grade = $grade")->count();// 查询满足要求的总记录数
        $Page = new Page($count, 3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $user->where("teamer_grade = $grade")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('total', $count);
        $this->assign('i', 0);
        $this->display(); // 输出模板
    }

    public function showinfo()
    {
        $admin = M('tp_teamer_admin', '', 'mysql://root:@localhost/coder');
        $a = $admin->where('id=1')->find();

        $this->assign('show_how', $a);
        $user = M('tp_teamer');

        $grade = $_GET['grade'];
        if ($grade == '') $grade = 2013;
        $count = $user->where("teamer_grade = $grade")->count();// 查询满足要求的总记录数
        $Page = new Page($count, 3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $user->where("teamer_grade = $grade")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板

    }

    public function getele()
    {
        $user = M('tp_teamer');
        $all_grade = $user->where('is_new_grade=1')->field('teamer_grade')->select();
        $cnt = $user->where('is_new_grade=1')->count();
        $label = 1;
        for ($i = 0; $i < $cnt; $i++) {
            if ($all_grade[$i]['teamer_grade'] == $_POST['teamer_grade']) {
                $label = 0;
                break;
            }
        }
        if ($label == 1) $teamer['is_new_grade'] = 1;
        else $teamer['is_new_grade'] = 0;
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
        $teamer['teamer_school'] = $_POST['teamer_school'];
        $teamer['teamer_group'] = $_POST['teamer_group'];

        $teamer['teamer_mainpage_link'] = $_POST['teamer_mainpage_link'];
        $user->add($teamer);


        $content = $this->fetch('Admin/add_member');
        $this->show($content);


    }

    public function dinfo()
    {
        $user = M('tp_teamer');
        $id = $_GET['teamer_id'];
        $the_ele = $user->where("id=$id")->find();
        $see = $user->where("teamer_grade=$the_ele[teamer_grade]")->select();
        $contain = count($see);
        if ($contain > 1) {
            $set['id'] = $see[1]['id'];
            $set['is_new_grade'] = 1;
            $user->save($set);
        }
        $user->where("id=$id")->delete();


        $all_grade = $user->where('is_new_grade=1')->field('teamer_grade')->select();
        $cnt = $user->where('is_new_grade=1')->count();

        for ($i = 0; $i < $cnt; $i++) {
            for ($j = 0; $j < $cnt - $i - 1; $j++) {
                if ($all_grade[$j]['teamer_grade'] > $all_grade[$j + 1]['teamer_grade']) {
                    $temp = $all_grade[$j]['teamer_grade'];
                    $all_grade[$j]['teamer_grade'] = $all_grade[$j + 1]['teamer_grade'];
                    $all_grade[$j + 1]['teamer_grade'] = $temp;
                }
            }
        }
        $this->assign('all_grade', $all_grade);
        $this->assign('cnt', $cnt);
        $grade = $_GET['grade'];
        if ($grade == '') $grade = 2013;
        $count = $user->where("teamer_grade = $grade")->count();// 查询满足要求的总记录数
        $Page = new Page($count, 3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $user->where("teamer_grade = $grade")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('total', $count);
        $this->assign('i', 0);
        $content = $this->fetch('Admin/member_table');
        $this->show($content);
    }

    public function updateinfo()
    {

        $user = M('tp_teamer');
        $id = $_GET['teamer_id'];
        $ele = $user->where("id = $id")->select();
        $this->assign('ele', $ele);
        $content = $this->fetch('Admin/update_member');
        $this->show($content);


    }

    public function saveinfo()
    {
        $user = M('tp_teamer');
        $id = $_GET['teamer_id'];
        $upload = new Upload();
        $upload->maxSize = 3145728;
        $upload->exts = array('jpg', 'jpeg', 'gif', 'png');
        $upload->savePath = './teamer_photo';
        $info = $upload->upload();
        if (!$info) {
            //  $this->error($upload->getError());
        } else {
            foreach ($info as $file) {
                $teamer['teamer_photo_loc'] = $file['savepath'] . $file['savename'];
            }
        }
        $teamer['id'] = $id;
        $teamer['teamer_name'] = $_POST['teamer_name'];
        $teamer['teamer_grade'] = $_POST['teamer_grade'];
        $teamer['teamer_group'] = $_POST['teamer_group'];
        $teamer['teamer_school'] = $_POST['teamer_school'];
        $user->save($teamer);


        $all_grade = $user->where('is_new_grade=1')->field('teamer_grade')->select();
        $cnt = $user->where('is_new_grade=1')->count();

        for ($i = 0; $i < $cnt; $i++) {
            for ($j = 0; $j < $cnt - $i - 1; $j++) {
                if ($all_grade[$j]['teamer_grade'] > $all_grade[$j + 1]['teamer_grade']) {
                    $temp = $all_grade[$j]['teamer_grade'];
                    $all_grade[$j]['teamer_grade'] = $all_grade[$j + 1]['teamer_grade'];
                    $all_grade[$j + 1]['teamer_grade'] = $temp;
                }
            }
        }
        $this->assign('all_grade', $all_grade);
        $this->assign('cnt', $cnt);
        $grade = $_GET['grade'];
        if ($grade == '') $grade = 2013;
        $count = $user->where("teamer_grade = $grade")->count();// 查询满足要求的总记录数
        $Page = new Page($count, 3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $user->where("teamer_grade = $grade")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('total', $count);
        $this->assign('i', 0);

        $content = $this->fetch('Admin/member_table');
        $this->show($content);
    }

    public function searchinfo()
    {
        $user = M('tp_teamer');
        $search = $_POST['search'];
        echo $search;
        $keyword = $_POST['keyword'];
        $condition;
        if ($search == 1) $condition = "teamer_name = $keyword";
        if ($search == 2) $condition = "teamer_grade = $keyword";
        if ($search == 3) $condition = "teamer_group = $keyword";
        if ($search == 4) $condition = "teamer_school = $keyword";
        $count = $user->where($condition)->count();

        $Page = new Page($count, 3);
        $show = $Page->show();// 分页显示输出
        $list = $user->where($condition)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);
        var_dump($list);
        $content = $this->fetch('Admin/showinfo');
        $this->show($content);
    }

    public function show_update()
    {
        $admin = M('tp_teamer_admin', '', 'mysql://root:@localhost/coder');
        $a = $admin->where('id=1')->find();

        $this->assign('show_how', $a);
        $content = $this->fetch('Admin/show_control');
        $this->show($content);
    }

    public function show_save()
    {
        $admin = M('tp_teamer_admin', '', 'mysql://root:@localhost/coder');
        $a['id'] = 1;
        $a['show_num'] = $_POST['new_num'];
        $a['show_grade'] = $_POST['new_grade'];
        $admin->save($a);
        $this->assign('show_how', $a);
        $this->assign('state', '设置成功！');
        $content = $this->fetch('Admin/show_control');
        $this->show($content);

    }

} 