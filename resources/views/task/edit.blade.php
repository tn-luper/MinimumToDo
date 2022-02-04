    @extends('layouts.app')

    @section('content')
    <div>
        <h4>タスクを編集</h4>
        <form action="/edit/{{ $task->id }}" method="POST">
            @csrf
            @method('PUT')
            <p>
            実施日：<input type="date" name="task[date]" value="{{date_format($task->date, "Y-m-d")}}">
            </p>
            <p class="date__error" style="color:red">{{ $errors->first('task.date') }}</p>
            <p>
            タスクの内容：<input type="text" name="task[task_name]" value="{{ $task->task_name}}">
            </p>
            <p class="task_name__error" style="color:red">{{ $errors->first('task.task_name') }}</p>
            <p>
            タスクを行うタイミング：<input type="text" name="task[start_time]" value="{{ $task->start_time}}">
            </p>
            <p class="start_time__error" style="color:red">{{ $errors->first('task.start_time') }}</p>
            <p>
            最低限やること(must)：<input type="text" name="task[bare_minimum]" value="{{ $task->bare_minimum}}">
            </p>
            <p class="bare_minimum__error" style="color:red">{{ $errors->first('task.bare_minimum') }}</p>
            <p>
            できたらやること(want)：<input type="text" name="task[target_amount]" value="{{ $task->target_amount}}">
            </p>
            <p class="target_amount__error" style="color:red">{{ $errors->first('task.target_amount') }}</p>
            <p>
            工夫：<input type="text" name="task[plan]" value="{{ $task->plan}}">
            </p>
            <p class="plan__error" style="color:red">{{ $errors->first('task.plan') }}</p>
            <input type="hidden" name="task[user_id]" value={{Auth::id()}}>
            <button type="submit" class="btn btn-primary">編集を保存</button>
            <a class="btn btn btn-outline-secondary" href='/' role="button">キャンセル</a>
        </form>
    </div>
    @endsection
