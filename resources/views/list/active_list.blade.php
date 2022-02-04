    @extends('layouts.app')

    @section('content')
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/"><b>今日のタスク</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/past">過去のタスク</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/record">過去の達成率</a>
            </li>
        </ul>
      
        @foreach ($tasks as $task)
    　  <div class="card w-75">
            <div class="card-header header">
                <h5>{{date('Y年m月d日',  strtotime($task->date))}}：{{$task->start_time}}</h5>
                <div class="btn-group header-user-icon">
                    <a class="btn btn-light" href="/edit/{{$task->id}}" role="button">編集</a>
                    <form action="/active/{{$task->id}}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-light">削除</button> 
                    </form>
                </div>
            </div>
            <div class="card-body">
            <h5 class="card-title"><b>{{$task->task_name}}</b></h5>
            <p class="card-must">must：{{$task->bare_minimum}}</p>
            <p class="card-want">want：{{$task->target_amount}}</p>
            <p class="card-plan">工夫：{{$task->plan}}</p>
            
            <form action="/active/{{$task->id}}/status/1" method="post" style="display:inline">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-outline-success custom">達成(want)</button> 
            </form>
            
            <form action="/active/{{$task->id}}/status/2" method="post" style="display:inline">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-outline-warning custom">達成(must)</button> 
            </form>
            
            <form action="/active/{{$task->id}}/status/3" method="post" style="display:inline">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-outline-danger custom">未達成</button> 
            </form>
            </div>
            
        </div>
        @endforeach
        
        <p></p>
        @if($activequantity < 3)
            <a class="btn btn-primary" href='/create' role="button">タスクの追加</a>
        @endif
    @endsection