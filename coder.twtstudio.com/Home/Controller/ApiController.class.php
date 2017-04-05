<?php
namespace Home\Controller;

use Think\Controller;
use Home\Common\Util\TWTAPIHelper;

class ApiController extends Controller
{
  protected $twtApi;

  public function _initialize()
  {
    session_start();
    echo 1111;
    $this->twtApi = new TWTAPIHelper();
  }

  public function login()
  {
    $username = I('post.account');
    $password = I('post.password');

    if ($this->twtLogin($username, $password, $ishashed = 0)) {
      $where = array(
          'keyword' => $username,
          'field' => 'username'
      );
      $check = $this->twtApi->query('student.info', $where);
      $result = $check->db;

      $arr = array(
        'code' => 1,
        'data' => array(
          'name' => $result->realname,
          'college' => $result->college,
          'major' => $result->major,
          'grade' => $result->grade,
        ),
      );

      // $_SESSION['uid']      = $result->uid;
      // $_SESSION['realname'] = $result->realname;
      // $_SESSION['college']  = $result->college;
      // $_SESSION['major']    = $result->major;
      // $_SESSION['grade']    = $result->grade;

    } else {

      $arr['code'] = 0;
      $arr['msg']    = '密码错误';

    }

    echo json_encode($arr);
    return;
  }

  public function submit()
  {
    $phone = trim(I('post.phone'));
    $reason = I('post.reason');
    $group = I('post.group');

    $search ='/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/';
    if(isset($_SESSION['user']) && !empty($phone) && preg_match($search,$phone)) {
      // $where = array(
      //     'keyword' => $_SESSION['twt_uid'],
      //     'field' => 'uid'
      // );
      // $check = $this->twtApi->query('student.info', $where);
      // $result = $check->db;
      $result = $_SESSION['user']->result;
      $array = array(
        'realname'=>$result->user_info->username,
        'college'=>$result->college,
        'major'=>$result->major,
        'phone'=>$phone,
        'grade'=>$result->user_info->stu_in_time,
        'reason'=>$reason,
        'group'=>$group,
        'stime'=>date("Y-m-d H:i:s",time()),
        'studentid'=>$result->user_number,
        );
      if($this->addPerson($array)){
        $arr['code'] = 1;
      }else{
        $arr['code'] = 0;
        $arr['msg']='提交异常';
      }
    } else {
      $arr['code'] = 0;
      if(empty($phone))
        $arr['msg']='联系电话非常重要！请务必填写';
      else if(!preg_match($search,$phone))
        $arr['msg']='程序猿友情提示，这不是手机号哦~';
      else
        $arr['msg'] = '非法提交';
    }
    echo json_encode($arr);
    return;
  }

  private function twtLogin($username, $password, $ishashed)
  {
    $result = $this->twtApi->query('twt.login',array(
      'username'  =>  $username,
      'password'  =>  $password,
      'ishashed'  =>  $ishashed
    ));

    if ($result) {
      $_SESSION['realname'] = $result->twtname;
      $_SESSION['twt_account'] = $result->auth_key;
      $_SESSION['twt_authkey'] = $result->realname;
      $_SESSION['twt_uid'] = $result->uid;
    }
    return $result;
  }

  private function userIsLogin()
  {
    if (!empty($_SESSION['twt_account'])) {
      return true;
    } else {
      return false;
    }
  }

  private function addPerson($arr)
  {
    $Person = M('Person', 'twt_');
    $Person->create($arr);
    $index = $Person->add();
    return $index;
  }
}