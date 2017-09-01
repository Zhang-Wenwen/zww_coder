<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/23
 * Time: 20:24
 */

namespace App\Http\Controllers;
use App\Project;
use App\Member;
use App\Team;
use App\Users;
use App\Message_board;
use App\Milestone;
use App\Backup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ManagerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $introduce=DB::table('introduce')->paginate(2);
        return view('Manager.home',[
            'introduce'=>$introduce
        ]);
    }
    public function message(){
        $message_board=new Message_board();
        $message_board=$message_board->orderBy('created_at','desc')->paginate(6);
        return view('manager.message_board',[
            'messages'=>$message_board,
        ]);
    }
    public function delete_np($table,$id){
        $bool=DB::table($table)->where('id',$id)->delete();
        if($bool==1){
          return  redirect()->action('ManagerController@index');
        }
        else
            echo "删除失败，请重试";
    }
    public function team( ){
        $team = Team::paginate(5);
        return view('Manager.team',[
            'team'=>$team
        ]);
    }
    public function projects(){
        $projects=Project::paginate(3);
        return view('Manager.projects',[
            'projects'=>$projects
        ]);
    }
    public function update_team($id){
        $team=Team::find($id);
        return view('Manager.update_team',[
            'team'=>$team,
            'table'=>'team'
        ]);
    }
    public function update_member($id){
        $member=Member::find($id);
        return view('Manager.update_member',[
            'member'=>$member,
            'table'=>'members'
        ]);
    }
    public function update_view($table,$id){
        if($table=='introduce'){
            $introduce=DB::table($table)->find($id);
            return view('Manager.update_introduce',[
                'introduce'=>$introduce
            ]);
        }
        if($table=='milestones'){
            $milestone=Milestone::find($id);
            return view('Manager.update_milestones',[
                'milestones'=>$milestone
            ]);
        }
        if($table=='projects'){
            $projects=Project::find($id);
            return view('Manager.update_projects',[
                'projects'=>$projects
            ]);
        }
    }
    public function update($table,$id,Request $request)
    {
        if($table=='introduce'){
                DB::table($table)
                ->where('id',$id)
                ->update(['Model'=>$request->input('model')],
                         ['content'=>$request->input('editor')]);
            return redirect()->action('ManagerController@index');
        }
        if($table=='milestones'){
            $milestones=Milestone::find($id);
            $milestones->year = $request->input('year');
            $milestones->events = $request->input('events');
            $bool = $milestones->save();
            if ($bool) {
                return redirect()->action('ManagerController@milestones');
            } else {
                abort("修改未成功，请稍后重试");
//                return redirect()->action('ManagerController@milestones');
            }
        }
        if ($request->file('file') != null) {
            if ($request->isMethod('POST')) {
                $file = $request->file('file');
                if ($file->isValid()) {
                    $ext = $file->getClientOriginalExtension();
                    $realpath = $file->getRealPath();
//                    $originfile=DB::table($table)->value('pic');
//                    $bool= Storage::delete($originfile); ////  删除文件没有成功,不知道为什么=^=
                    $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                    Storage::disk('public')->put($filename, file_get_contents($realpath));
                    DB::table($table)->where('id', $id)
                        ->update(['pic' => $filename]);
                }
            } else abort('哎呀呀，文件上传出错啦，请再试一次吧');
        }
        if ($table == 'team') {
            $team = Team::find($id);
            $team->name = $request->input('name');
            $team->text = $request->input('text');
            $team->now = $request->input('now');
            $team->group = $request->input('group');
            $team->duty = $request->input('duty');
            $team->tag = $request->input('tag');
            if($request->input('optionsRadios')!=null)
            {
                $team->type = $request->input('optionsRadios');
            }
            $bool = $team->save();
        if ($bool) {
            return redirect()->action('ManagerController@team');
        } else {
            abort("修改未成功，请稍后重试");
            return redirect()->action('ManagerController@team');
             }
         }
        if ($table=="members"){
            $member=Member::find($id);
            $member->name = $request->input('name');
            $member->group = $request->input('group');
            $member->major = $request->input('major');
            $member->grade = $request->input('grade');
            $bool = $member->save();
            if ($bool) {
                return redirect()->action('ManagerController@member');
            } else {
                abort("修改未成功，请稍后重试");
                return redirect()->action('ManagerController@member');
            }
        }
        if ($table=="projects") {
            $this->validate($request,[
                'file'=>'size:557*234',
            ]);
            $projects = Project::find($id);
            $projects->name = $request->input('name');
            $projects->desc = $request->input('desc');
            $projects->type = $request->input('type');
            $projects->link = $request->input('link');
            if($request->input('type')!=null)
            {
                $projects->type = $request->input('type');
            }
            else  $projects->type = Project::find($id)->value('type');
            $bool = $projects->save();
            if ($bool) {
                return redirect()->action('ManagerController@projects');
            } else {
                abort("修改未成功，请稍后重试");
                return redirect()->action('ManagerController@projects');
            }
        }
    }
    public function add(Request $request,$table){
        if ($request->file('file') != null) {
            if ($request->isMethod('POST')) {
                $file = $request->file('file');
                if ($file->isValid()) {
                    $ext = $file->getClientOriginalExtension();
                    $realpath = $file->getRealPath();
                    $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                    Storage::disk('public')->put($filename, file_get_contents($realpath));
                }
            } else abort('哎呀呀，文件上传出错啦，请再试一次吧');
        }
        if ($table == 'team') {
            $team=new Team();
            $team->name = $request->input('name');
            $team->text = $request->input('text');
            $team->now = $request->input('now');
            $team->group = $request->input('group');
            $team->duty = $request->input('duty');
            $team->tag = $request->input('tag');
            $team->pic = $request->input('pic');
            $team->pic = $request->input('optionsRadios');
            if($request->input('optionsRadios')!=null)
            {
                $team->type = $request->input('optionsRadios');
            }
            else
            {
                $team->type = -1;
            }
            $bool = $team->save();
            if ($bool) {
                return redirect()->action('ManagerController@team');
            } else {
                abort("添加未成功，请稍后重试");
//                return redirect()->action('ManagerController@team');
            }
        }
    }
    public function add_np(Request $request,$table){
        if($table=='milestones'){
            $milestones=new Milestone();
            $milestones->year=$request->input('year');
            $milestones->events=$request->input('events');
            $bool=$milestones->save();
            if ($bool) {
                return redirect()->action('ManagerController@milestones');
            } else {
                abort("添加未成功，请稍后重试");
//                return redirect()->action('ManagerController@milestones');
            }
        }
    }
    public function add_view($table){
        if($table=='team'){
            return view('Manager.add_team');
        }
        if($table=='member'){
            return view('Manager.add_member');
        }
        if ($table=='events')
        {
            return view('Manager.add_milestone');
        }
    }
    public function member(){
        $member = Member::paginate(5);
        return view('Manager.member',[
            'team'=>$member
        ]);
    }
    public function milestones(){
        $milestones=Milestone::orderBy('year','desc')->paginate(6);
        return view('Manager.milestones',[
            'milestones'=>$milestones
        ]);
    }
}