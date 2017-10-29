<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/22
 * Time: 8:46
 */
  //config('app.url')."/"
namespace App\Http\Controllers;
use App\Activity;
use App\Project;
use App\Member;
use App\Team;
use App\Message_board;
use App\Milestone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use SimpleSoftwareIO\QrCode\Facades\QrCode;
//use Illuminate\Auth;
//use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Validator;
class CoderController  extends Controller
{
    public function member(){
        $members = Member::all()->toArray();
        shuffle($members);
        foreach ($members as $key=>$value){
            $members[$key]['pic']=config('app.url').$value['pic'];
        };
        return response()->json($members);
    }
    public function personal_info(){
        $personal_info =Team::all()->toArray();
        foreach ($personal_info as $key=>$value){
            $personal_info[$key]['pic']=config('app.url').$value['pic'];
        };
        return response()->json($personal_info);
    }
    public function project(){
        $projects=Project::all()->toArray();
//        foreach($projects as $i => $v){
//            $projects[$i] = array_map(function($item){
//                if($item === null){
//                    return "";
//                }else{
//                    return $item;
//                }
//            }, $projects[$i]);
//        }
        foreach ($projects as $key=>$value){
            $projects[$key]['pic']=config('app.url').$value['pic'];
        };
        return response()->json($projects);
    }

    public function message_board(){
        $message_board=new Message_board();
        $message_board=$message_board->orderBy('created_at','desc')->where('is_examined',1)->take(8)->get();
        return response()->json($message_board);
    }
    public function milestones(){
        $milestones=Milestone::orderBy('year','desc')->get();
        return response()->json($milestones);
    }

    public function introduce(){
        $introduce=DB::table('introduce')->get();
        return response()->json($introduce);
    }
    public function form(Request $request){
        $message=new Message_board;
        $message->name=$request->input('name');
        $message->email=$request->input('email');
        $message->text=$request->input('text');
       $bool= $message->save();
        if ($bool)
        {
            return response()->json('ok');
        }

    }
    public function Qrcode(){
        $name=DB::table('qrcode')->value('name');
        $desc=DB::table('qrcode')->value('desc');
        $Qrcode=DB::table('qrcode')->value('Qrcode');
            $Qrcode=config('app.url').$Qrcode;
        return response()->json([
            'title'=>$name,
            'desc'=>$desc,
            'Qrcode'=>$Qrcode
        ]);
    }
    public function advertise(){
        $advertise=DB::table('advertise')->get();
        foreach ($advertise as $key=>$value){
            $advertise[$key]->pic=config('app.url').$value->pic;
        };
        return response()->json($advertise);
    }
    public function activity(){
        $activity=DB::table('activities')->select('id','name','time','pic','summary')->get()->toArray();
        foreach ($activity as $key=>$value){
            $activity[$key]->pic=config('app.url').$value->pic;
        };
        return response()->json([$activity]);
    }

    /**
     * @return string
     */
    public function activity_detail($id)
    {
        $activity=Activity::find($id);
            $activity->pic=config('app.url').$activity->pic;
        return response()->json([$activity]);
    }
}