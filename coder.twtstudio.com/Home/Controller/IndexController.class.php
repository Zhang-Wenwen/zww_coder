<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends CommonController
{
    public function index()
    {
        $m = M('Index_pic');
        $condition['pic_isshow'] = 1;
        //$arr = $m->order('pic_showid')->where($condition)->select(); 显示前台展示的轮播
        $arr = $m->select();//显示所有轮播
        $this->assign('data', $arr);
        $this->display();
    }

    /*
 *	删除首页轮播页面
     *  * */
    public function del()
    {
        $m = M('Index_pic');
        $id = $_GET['id'];
        $count = $m->delete($id);
        if ($count > 0) {
            $this->success('数据删除成功');
        } else {
            $this->error('数据删除失败');
        }
    }

    /*
         * 添加幻灯片页面
         * */
    public function add()
    {
        $this->display();
    }

    //新增幻灯片操作
    public function create()
    {
        $m = M('index_pic');
        $m->pic_name = $_POST['pic_name'];
        $m->pic_link = $_POST['pic_link'];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/'; // 设置附件上传根目录
        $upload->savePath = '/Images/IndexPic/'; // 设置附件上传（子）目录
        $upload->autoSub = false;
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {
            foreach ($info as $file) {
                $m->pic_loc = $file['savepath'] . $file['savename'];//图片的相对路径赋值给
            }
        }
        $count = $m->add();
        if ($count > 0) {
            $this->success('数据添加成功', 'index');
        } else {
            $this->error('数据添加失败');
        }

    }


    /*
*	显示修改首页轮播页面
 *  * */

    public function modifypic()
    {
        $id = $_GET['id'];
        $m = M('Index_pic');
        $arr = $m->find($id);
        $this->assign('data', $arr);
        $this->display();
    }

    /*
       *修改首页轮播信息
      */


    public function update()
    {
        $m = M('index_pic');
        $m->pic_name = $_POST['pic_name'];
        $m->pic_link = $_POST['pic_link'];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/'; // 设置附件上传根目录
        $upload->savePath = '/Images/IndexPic/'; // 设置附件上传（子）目录
        $upload->autoSub = false;
        $info = $upload->upload();
        if (!$info) {
            //什么都不用做
        } else {
            foreach ($info as $file) {
                $m->pic_loc = $file['savepath'] . $file['savename'];//图片的相对路径赋值给
            }
        }
        //设置查询条件id来自表单
        $condition['id'] = $_POST['id'];
        // 把查询条件传入查询方法
        $count = $m->where($condition)->save();
        if ($count > 0) {
            $this->success('数据添加成功', 'modifypic');
        } else {
            $this->error('数据添加失败');
        }
    }

    /*
*	显示修改首页文字
  *  * */
    public function modifyword()
    {
        $m = M('Index_words');
        $arr = $m->select();
        $this->assign('data', $arr);
        $this->display();
    }

    public function update_word()
    {
        $m = M('index_words');
        $m->word = $_POST['word'];
        //设置查询条件id来自表单
        $condition['id'] = $_POST['id'];
        // 把查询条件传入查询方法
        $count = $m->where($condition)->save();
        if ($count > 0) {
            $this->success('数据添加成功', 'modifyword');
        } else {
            $this->error('数据添加失败');
        }
    }

    /*
*	显示轮播
  *  * */
    public function show()
    {
        $id = $_GET['id'];
        $m = M('Index_pic');
        //统计显示的轮播的数量
        $showCount = $m->where('pic_isshow=1')->count();
        $m->pic_isshow = 1;
        $m->pic_showid = $showCount+1;
        //设置查询条件id来自表单
        $condition['id'] = $id;
        $count = $m->where($condition)->save();
        //自动更新排序
        //查找所有轮播需要展示的记录
        $arr1 = $m->where('pic_isshow=1')->order('pic_showid')->select();
        for($i = 0;$i<count($arr1);$i++){
            $data['pic_showid'] = $i+1;
            $m->where('id=%d',$arr1[$i]['id'])->save($data);
        }
        if ($count > 0) {
            $this->success('轮播显示成功');
        } else {
           $this->error('轮播显示失败');
        }
    }
    /*
*	隐藏轮播
  *  * */
    public function hide()
    {
        $id = $_GET['id'];
        $m = M('Index_pic');
        $m->pic_isshow = 0;
        $m->pic_showid = 0;
        //设置查询条件id来自表单
        $condition['id'] = $id;
        // 把查询条件传入查询方法
        $count = $m->where($condition)->save();
        if ($count > 0) {
            //自动更新排序
            //查找所有轮播需要展示的记录
            $arr1 = $m->where('pic_isshow=1')->order('pic_showid')->select();
            for($i = 0;$i<count($arr1);$i++){
                $data['pic_showid'] = $i+1;
                $m->where('id=%d',$arr1[$i]['id'])->save($data);
            }
            $this->success('轮播隐藏成功');
        } else {
            $this->error('轮播隐藏失败');
        }
    }
    /*
*	轮播排序
  *  * */
    public function sort()
    {
        if ($_POST['order']) {
            $order = explode(',', $_POST['order']);
            $i = 1;
            foreach ($order as $v) {
                M("index_pic")->where('id=' . intval($v))->save(array(
                    'pic_showid' => $i
                ));
                // 根据条件保存修改的数据
                $i++;
            }
        } else {
            $m = M('index_pic');
            $condition['pic_isshow'] = 1;
            $arr = $m->order('pic_showid')->where($condition)->select();
            $this->assign('data', $arr);
            $this->display();
        }
    }
}