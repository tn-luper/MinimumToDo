<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     *トップページ（今日のタスク）を表示
     * 
     * @param Task $task
     * @return view
     */
    public function active_list(Task $task)
    {
        return view('list/active_list')->with(['tasks' => $task->getactive(), 'activequantity' => $task->countactive()]);
    } 
    
    /**
     * タスクの追加のページの表示
     * 
     * @return View
     */
    public function create()
    {
        return view('task/create');
    }
    
    /**
     * 新規タスクの登録
     * 
     * @param TaskRequest $request
     * @param Task $task
     * @return Response
     */
    public function store(TaskRequest $request, Task $task)
    {
        $input = $request['task'];
        $task->timestamps = false; 
        $task->fill($input)->save();
        return redirect('/');
    }
    
    /**
     * タスクの編集ページの表示
     * 
     * @param Task $task
     * @return View
     */
    public function edit(Task $task)
    {
        return view('task/edit')->with(['task' => $task]);
    }
    
    /**
     * タスクの変更内容を保存
     * 
     * @param TaskRequest $request
     * @param Task $task
     * @return Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        $input_task = $request['task'];
        $task->timestamps = false;
        $task->fill($input_task)->save();

        return redirect('/');
    }
    
    /**
     * タスク（今日のタスク）を削除
     * 
     * @oaram Task $task
     * @return Response
     */
    public function activedelete(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
    
    /**
     * タスク（過去のタスク）を削除
     * 
     * @oaram Task $task
     * @return Response
     */
    public function pastdelete(Task $task)
    {
        $task->delete();
        return redirect('/past');
    }
    
    /**
     *タスクのステータスの変更 
     * １が達成（want）、２が達成（must）、３が未達成
     * 
     * @param Request $request
     * @param Task $task
     * @param int $afterstatus
     * @return Response
     */
    public function Changestatus(Request $request, Task $task, $afterstatus)
    {
        $task->timestamps = false;
        $task->status = $afterstatus;
        $task->save();
        return redirect('/');
    }
    
    /**
     * 過去のタスクの一覧ページの表示
     * 
     * @param Task $task
     * @return View
     */
    public function past_list(Task $task)
    {
        return view('list/past_list')->with(['tasks' => $task->getpast()]);
    }
    
    /**
     * 過去の達成率をグラフ化したページを表示
     * 
     * @param Task $task
     * @param array $pastcounts 各月のタスク数
     * @param array $status1counts 各月の達成（want）のタスク数
     * @param array $status2counts 各月の達成（must）のタスク数
     * @param array $status3counts 各月の未達成のタスク数
     * @return View
     */
    public function record_page(Task $task)
    {
        $pastresults = $task->getpastbymonth();
        foreach ($pastresults as $key=>$pastresult){
            $pastcounts[$key] = $pastresult->count();
        }
        
        $status1results = $task->getstatus1bymonth();
        foreach ($status1results as $key=>$status1result){
            $status1counts[$key] = $status1result->count();
        }
        
        $status2results = $task->getstatus2bymonth();
        foreach ($status2results as $key=>$status2result){
            $status2counts[$key] = $status2result->count();
        }
        
        $status3results = $task->getstatus3bymonth();
        foreach ($status3results as $key=>$status3result){
            $status3counts[$key] = $status3result->count();
        }
 
        return view('list/record')->with(['pastcounts' => $pastcounts, 'status1counts' => $status1counts, 'status2counts' => $status2counts, 'status3counts' => $status3counts]);
    }

    
}


