<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function active_list(Task $task)
    {
        return view('active_list')->with(['tasks' => $task->getactive(), 'activequantity' => $task->countactive()]);
    } 
    
    public function create()
    {
        return view('create');
    }
    
    public function store(TaskRequest $request, Task $task)
    {
        $input = $request['task'];
        $task->timestamps = false; 
        $task->fill($input)->save();
        return redirect('/active');
        
    }
    
    public function edit(Task $task)
    {
        return view('edit')->with(['task' => $task]);
    }
    
    public function update(TaskRequest $request, Task $task)
    {
        $input_task = $request['task'];
        $task->timestamps = false;
        $task->fill($input_task)->save();

        return redirect('/active');
    }
    
    public function activedelete(Task $task)
    {
        $task->delete();
        return redirect('/active');
    }
    
    public function pastdelete(Task $task)
    {
        $task->delete();
        return redirect('/past');
    }
    
    public function Changestatus(Request $request, Task $task, $afterstatus)
    {
        $task->timestamps = false;
        $task->status = $afterstatus;
        $task->save();
        return redirect('/active');
    }
    
    public function past_list(Task $task)
    {
        return view('past_list')->with(['tasks' => $task->getpast()]);
    }
    
    // public function record_page(Task $task)
    // {
    //     $pastresults = $task->getpastbymonth();
    //     foreach ($pastresults as $key=>$pastresult){
    //         $pastcounts[$key] = $pastresult->count();
    //     }
        
    //     $status1results = $task->getstatus1bymonth();
    //     foreach ($status1results as $key=>$status1result){
    //         $status1counts[$key] = $status1result->count();
    //     }
        
    //     $status2results = $task->getstatus2bymonth();
    //     foreach ($status2results as $key=>$status2result){
    //         $status2counts[$key] = $status2result->count();
    //     }
        
    //     $status3results = $task->getstatus3bymonth();
    //     foreach ($status3results as $key=>$status3result){
    //         $status3counts[$key] = $status3result->count();
    //     }
 
    //     return view('record')->with(['pastcounts' => $pastcounts, 'status1counts' => $status1counts, 'status2counts' => $status2counts, 'status3counts' => $status3counts]);
    // }

    
}


