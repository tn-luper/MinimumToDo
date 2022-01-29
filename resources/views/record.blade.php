<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Minimum ToDo</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    @extends('layouts.app')

    @section('content')
        <h1>Minimum ToDo</h1>
        <h2>タスクの達成率</h2>
            @foreach ($pastcounts as $pastkey => $pastvalue)
                <p>{{$pastkey}}</p>
                <p>{{$pastvalue}}</p>
                @foreach ($status1counts as $status1key => $status1value)
                    @if($status1key === $pastkey)
                    <p>{{$status1value/$pastvalue}}</p>
                    @endif
                @endforeach
                @foreach ($status2counts as $status2key => $status2value)
                    @if($status2key === $pastkey)
                    <p>{{$status2value}}</p>
                    @endif
                @endforeach
                @foreach ($status3counts as $status3key => $status3value)
                    @if($status3key === $pastkey)
                    <p>{{$status3value}}</p>
                    @endif
                @endforeach
            @endforeach
    @endsection
</html>