<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/22
 * Time: 8:46
 */

namespace App\Http\Controllers;
use App\Project;
use App\Member;
use App\Team;
use App\Message_board;
use App\Milestone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class CoderController  extends Controller
{
    public function member(){
        $members = Member::all()->toArray();
        shuffle($members);
        return response()->json($members);
    }
    public function personal_info(){
        $personal_info =Team::all()->toArray();
        return response()->json($personal_info);
    }
    public function project(){
        $projects=Project::all()->toArray();
        return response()->json($projects);
    }
    public function message_board(){
        $message_board=new Message_board();
        $message_board=$message_board->orderBy('created_at','desc')->get();
        return response()->json($message_board);
    }
    public function milestones(){
        $milestones=Milestone::all();
        foreach ($milestones as $key=>$value)
        {
            $value->events;
        }
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
        $message->save();
        return response()->json($message);
    }
}