<?php

namespace App\Http\Controllers;

use App\Model\ListTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $data = ListTask::all();
       return view("index",compact("data"));
    }
    public function create(Request $request){
        $task = new ListTask();
        $task->content = $request->task;
        $task->save();
        return response()->json(['code'=>200, 'message'=>'THEM MOI THANH CONG','task'=>$task]);
    }
    public function delete(Request $request,$id){

        $task = ListTask::find($id);
        $task->delete;
        return response()->json(['code'=>200, 'message'=>'Xoa THANH CONG']);
    }
    public function changeStatus(Request $request,$id){

        $task = ListTask::find($id);

        $task->status = $task->status == 0 ? 1 : 0;

        $task->save();

        return response()->json(['code'=>200]);
    }
}
