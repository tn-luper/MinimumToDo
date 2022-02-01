    @extends('layouts.app')

    @section('content')
        <h1>Minimum ToDo</h1>
        
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/active">今日のタスク</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/past"><b>過去のタスク</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/record">過去の達成率</a>
            </li>
        </ul>
        
        <div class='tasks'>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">実施日</th>
                <th scope="col">タスクの内容</th>
                <th scope="col">タスクを行うタイミング</th>
                <th scope="col">最低限やること(must)</th>
                <th scope="col">できたらやること(want)</th>
                <th scope="col">工夫</th>
                <th scope="col">削除</th>
   　        </tr>
            </thead>
            <tbody>
            @foreach ($tasks as $task)
                <div class='task'>
                @if ($task->status === 1)
                <tr class="table-success">
                    <td>{{date('Y年m月d日',  strtotime($task->date))}}</td>
                    <td>{{$task->task_name}}</td>
                    <td>{{$task->start_time}}</td>
                    <td>{{$task->bare_minimum}}</td>
                    <td>{{$task->target_amount}}</td>
                    <td>{{$task->plan}}</td>
                    <td><form action="/past/{{$task->id}}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button> 
                        </form>
                    </td>
                </tr>
                @elseif ($task->status === 2)
                <tr class="table-warning">
                    <td>{{date('Y年m月d日',  strtotime($task->date))}}</td>
                    <td>{{$task->task_name}}</td>
                    <td>{{$task->start_time}}</td>
                    <td>{{$task->bare_minimum}}</td>
                    <td>{{$task->target_amount}}</td>
                    <td>{{$task->plan}}</td>
                    <td><form action="/past/{{$task->id}}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button> 
                        </form>
                    </td>
                </tr>
                @else ($task->status === 3)
                <tr class="table-danger">
                    <td>{{date('Y年m月d日',  strtotime($task->date))}}</td>
                    <td>{{$task->task_name}}</td>
                    <td>{{$task->start_time}}</td>
                    <td>{{$task->bare_minimum}}</td>
                    <td>{{$task->target_amount}}</td>
                    <td>{{$task->plan}}</td>
                    <td><form action="/past/{{$task->id}}" method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button> 
                        </form>
                    </td>
                </tr>
                @endif
                </div>
            @endforeach
            </tbody>
        </table>
        
        <div class='paginate'>
            {{ $tasks->links() }}
        </div> 
    @endsection