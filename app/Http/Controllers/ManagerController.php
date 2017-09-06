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
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class ManagerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $introduce=DB::table('introduce')->paginate(3);
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
        if($bool)
        {
            return redirect()->back()->withInput()->withErrors('删除成功！');
        }
       else   return redirect()->back()->withInput()->withErrors('删除失败！');
    }
    public function delete($table,$id){
        $filename= DB::table($table)->where('id', $id)->value('pic');
        storage::disk('public')->delete($filename);
        DB::table($table)->where('id', $id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功');
    }
    public function team( ){
        $team = Team::orderBy('created_at','desc')->paginate(5);
        return view('Manager.team',[
            'team'=>$team
        ]);
    }
    public function projects(){
        $projects=Project::orderBy('updated_at','desc')->paginate(3);
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
                ->update([
                    'Model'=>$request->input('model'),
                    'content'=>$request->input('editor')
                ]);
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
        if ($table == 'team') {
            $this->validate($request,[
                'file'=>'dimensions:width=688,height=565',
            ]);
            if ($request->file('file') != null) {
                if ($request->isMethod('POST')) {
                    $file = $request->file('file');
                    if ($file->isValid()) {
                        $ext = $file->getClientOriginalExtension();
                        $realpath = $file->getRealPath();
                        $originfile=DB::table($table)->value('pic');
                        $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                        $bool=Storage::disk('public')->put($filename, file_get_contents($realpath));
                        if ($bool)
                        {
                            Storage::disk('public')->delete($originfile);
                        }
                        $path='/storage/app/public/'.$filename;
                        DB::table($table)->where('id', $id)
                            ->update(['pic' => $path]);
                    }
                } else abort('哎呀呀，文件上传出错啦，请再试一次吧');
            }
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
            $this->validate($request,[
                'file'=>'dimensions:width=218,height=218',
            ]);
            if ($request->file('file') != null) {
                if ($request->isMethod('POST')) {
                    $file = $request->file('file');
                    if ($file->isValid()) {
                        $ext = $file->getClientOriginalExtension();
                        $realpath = $file->getRealPath();
                        $originfile=DB::table($table)->value('pic');
                        $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                        $bool=Storage::disk('public')->put($filename, file_get_contents($realpath));
                        if ($bool)
                        {
                            Storage::disk('public')->delete($originfile);
                        }
                        $path='/storage/app/public/'.$filename;
                        DB::table($table)->where('id', $id)
                            ->update(['pic' => $path]);
                    }
                } else abort('哎呀呀，文件上传出错啦，请再试一次吧');
            }
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
                'file'=>'dimensions:width=557,height=342',
            ]);
            if ($request->file('file') != null) {
                if ($request->isMethod('POST')) {
                    $file = $request->file('file');
                    if ($file->isValid()) {
                        $ext = $file->getClientOriginalExtension();
                        $realpath = $file->getRealPath();
                        $originfile=DB::table($table)->value('pic');
                        $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                        $bool=Storage::disk('public')->put($filename, file_get_contents($realpath));
                        if ($bool)
                        {
                            Storage::disk('public')->delete($originfile);
                        }
                        $path='/storage/app/public/'.$filename;
                        DB::table($table)->where('id', $id)
                            ->update(['pic' => $path]);
                    }
                } else abort('哎呀呀，文件上传出错啦，请再试一次吧');
            }
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
        if ($table == 'team') {
            $this->validate($request,[
                'file'=>'dimensions:width=688,height=565',
            ]);
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
            $team=new Team();
            $team->name = $request->input('name');
            $team->text = $request->input('text');
            $team->now = $request->input('now');
            $team->group = $request->input('group');
            $team->duty = $request->input('duty');
            $team->tag = $request->input('tag');
            $filename=$request->file('file')->getFilename();
            $team->pic = '/storage/app/public/'.$filename;
            $team->type = $request->input('optionsRadios');
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
        if ($table == 'projects') {
            $this->validate($request,[
                'file'=>'dimensions:width=557,height=342',
            ]);
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
            $projects=new Project();
            $projects->name = $request->input('name');
            $projects->desc = $request->input('desc');
            $projects->link = $request->input('link');
            $filename=$request->file('file')->getFilename();
            $projects->pic ='/storage/app/Qrcode/'.$filename;
            if($request->input('type')!=null)
            {
                $projects->type = $request->input('type');
            }
            else
            {
                $projects->type = 1;
            }
            $bool =  $projects->save();
            if ($bool) {
                return redirect()->action('ManagerController@projects');
            } else {
                abort('哎呀呀，出错啦，再来一次吧');
            }
        }
        if($table=='members'){
            $this->validate($request,[
                'file'=>'dimensions:width=218,height=218',
            ]);
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
            $member=new Member();
            $member->name = $request->input('name');
            $member->group = $request->input('group');
            $member->major = $request->input('major');
            $filename=$request->file('file')->getFilename();
            $member->pic = '/storage/app/public/'.$filename;
            $member->grade = $request->input('grade');
            $bool =  $member->save();
            if ($bool) {
                return redirect()->action('ManagerController@member');
            } else {
                abort('哎呀呀，出错啦，再来一次吧');
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
        if ($table=='advertise'){
          $bool=DB::table('advertise')->insert([
              'title'=>$request->input('title'),
              'desc'=>$request->input('desc'),
              'place'=>$request->input('place'),
              'created_at'=>date('Y-m-d')
          ]);
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
        if ($table=='projects')
        {
            return view('Manager.add_projects');
        }
    }
    public function member(){
        $member = Member::orderBy('created_at','desc')->paginate(5);
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
    public function add_Qrcode(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:qrcode,name|max:255',
            'link'=>'required|unique:qrcode,link|max:255',
            'desc'=>'required|max:255',
        ]);
        $link=$request->input('link');
        $name=$request->input('name');
        $desc=$request->input('desc');
        QrCode::format('png')->size(94)->color(0,161,233)->generate($link,storage_path('/app/Qrcode'.'/'.$name.'.'.'png'));
        $Qrcode='/storage/app/Qrcode'.'/'.$name.'.'.'png';
        DB::table('qrcode')->insert([
            'name'=>$name,
            'link'=>$link,
            'desc'=>$desc,
            'Qrcode'=>$Qrcode
        ]);
       return redirect()->action('ManagerController@Qrcode');
    }
    public function Qrcode(){
        $qrcodes=DB::table('qrcode')->paginate(6);
        return view('Manager.qrcode',[
            'qrcodes'=>$qrcodes
        ]);
    }
    public function delete_Qrcode($id){
        $originfile=DB::table('qrcode')->value('Qrcode');
        Storage::disk('Qrcode')->delete($originfile);
        $bool=DB::table('qrcode')->where('id',$id)->delete();
        if($bool)
        {
            return redirect()->back()->withInput()->withErrors('删除成功！');
        }
        else   return redirect()->back()->withInput()->withErrors('删除失败！');
    }
    public function advertise(){
        $advertise=DB::table('advertise')->oderBy('created_at,desc')->paginate(6);
        return view('Manager.advertise',[
            'advertise'=>$advertise
        ]);
    }
}