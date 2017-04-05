<?php
namespace Home\Controller;

use Think\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $m = M('Project');
        //查询前五张图片
        $arr = $m->order('project_show_id')->select();
        $map['project_show_id'] = array('elt', 5);//EGT：大于等于（>=）
        $arr1 = $m->where($map)->order('project_show_id')->select();
        //查询第五张以后的图片
        $map['project_show_id'] = array('gt', 5);//GT：大于（>）
        $arr2 = $m->where($map)->order('project_show_id')->select();
        $this->assign('data', $arr);
        $this->assign('data1', $arr1);
        $this->assign('data2', $arr2);
        $this->display();
    }
}