<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $m = M('Index_pic');
        //查询第一张轮播
        $map['pic_showid'] = array('eq',1);
        $arr1 = $m->where($map)->order('pic_showid')->select();
        $this->assign('pic1', $arr1);
        //查询第二张及以后的轮播
       // $map['pic_showid'] = array('egt',2);
        //$arr2 = $m->where($map)->order('pic_showid')->select();
        //$this->assign('pics', $arr2);

        //查询全部的轮播
        $arr = $m->where('pic_isshow=1')->order('pic_showid')->select();
        for($i = 0;$i<count($arr);$i++){
            $arr[$i]['pic_showid'] = $i;
        }
        $this->assign('pics', $arr);
        //echo $pics;
        //查询首页文字
        $m = M('Index_words');
        $id1 = 1;
        $id2 = 2;
        $arr1 = $m->find($id1);
        $arr2 = $m->find($id2);
        $this->assign('text1', $arr1);
        $this->assign('text2', $arr2);
        $this->display();
    }


}