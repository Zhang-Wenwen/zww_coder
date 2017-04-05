<?php
namespace Home\Controller;

use Think\Controller;

class ProjectController extends CommonController
{
    public function index()
    {
        $m = M('Project');
        $arr = $m->order('project_show_id')->select();
        $this->assign('data', $arr);
        $this->display();
    }

    public function del()
    {
        $m = M('Project');
        $id = $_GET['id'];
        $count = $m->delete($id);
        if ($count > 0) {
            $this->success('数据删除成功');
        } else {
            $this->error('数据删除失败');
        }
    }

    /*
     *	显示修改项目信息页面
     * */
    public function modify()
    {
        $id = $_GET['id'];
        $m = M('Project');
        $arr = $m->find($id);
        $this->assign('data', $arr);
        $this->display();
    }

    /*
       *	修改项目信息和图片
      */


    public function update()
    {
        $m = M('Project');
        $m->project_title = $_POST['project_title'];
        $m->project_pic_link = $_POST['project_pic_link'];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/'; // 设置附件上传根目录
        $upload->savePath = '/Images/ProjectPic/'; // 设置附件上传（子）目录
        $upload->autoSub = false;
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            // $this->error($upload->getError());
        } else {
            foreach ($info as $file) {
                $m->project_pic_loc = $file['savepath'] . $file['savename'];//图片的相对路径赋值给
            }
        }
        //设置查询条件id来自表单
        $condition['id'] = $_POST['id'];
        // 把查询条件传入查询方法
        $count = $m->where($condition)->save();
        if ($count > 0) {
            $this->success('数据添加成功', 'index');
        } else {
            $this->error('数据添加失败');
        }
    }


    /*
     * 新增项目页面
     * */
    public function add()
    {
        $this->display();
    }

    //新增项目操作
    public function create()
    {
        $m = M('Project');
        $m->project_title = $_POST['project_title'];
        $m->project_pic_link = $_POST['project_pic_link'];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/'; // 设置附件上传根目录
        $upload->savePath = '/Images/ProjectPic/'; // 设置附件上传（子）目录
        $upload->autoSub = false;
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {
            foreach ($info as $file) {
                $m->project_pic_loc = $file['savepath'] . $file['savename'];//图片的相对路径赋值给
            }
        }
        $count = $m->add();
        if ($count > 0) {
            $this->success('数据添加成功', 'index');
        } else {
            $this->error('数据添加失败');
        }

    }

//排序
    public function sort()
    {
        if ($_POST['order']) {
            $order = explode(',', $_POST['order']);
            $i = 1;
            foreach ($order as $v) {
                M("Project")->where('id=' . intval($v))->save(array(
                    'project_show_id' => $i
                ));
                // // 根据条件保存修改的数据
                $i++;
            }
        } else {
            $m = M('Project');
            $arr = $m->order('project_show_id')->select();
            $this->assign('data', $arr);
            $this->display();
        }
    }

}
