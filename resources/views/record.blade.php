    @extends('layouts.app')

    @section('content')
        <h1>Minimum ToDo</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/active">今日のタスク</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/past">過去のタスク</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/record"><b>過去の達成率</b></a>
            </li>
        </ul>
            @foreach ($pastcounts as $pastkey => $pastvalue)
                <p></p>
                <h3>{{date('Y年m月',  strtotime($pastkey))}}</h3>
                <h5>総タスク数：{{$pastvalue}}</h5>
                <div class="progress w-75" style="height: 30px;">
                @foreach ($status1counts as $status1key => $status1value)
                    @if($status1key === $pastkey)
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$status1value / $pastvalue * 100}}%"><font color="black" font size="3">{{round($status1value / $pastvalue * 100)}}%</font></div>
                    @endif
                @endforeach
                @foreach ($status2counts as $status2key => $status2value)
                    @if($status2key === $pastkey)
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{$status2value / $pastvalue * 100}}%"><font color="black" font size="3">{{round($status2value / $pastvalue * 100)}}%</font></div>
                    @endif
                @endforeach
                @foreach ($status3counts as $status3key => $status3value)
                    @if($status3key === $pastkey)
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{$status3value / $pastvalue * 100}}%"><font color="black" font size="3">{{round($status3value / $pastvalue * 100)}}%</font></div>
                    @endif
                @endforeach
                </div>
            @endforeach
    @endsection