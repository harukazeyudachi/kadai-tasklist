  
@extends('layouts.app')

@section('content')

    <h1> {{ $task->id }} タスクの詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td> {{ $task->id }} </td>
        </tr>
        <th>今の状態</th>
            <td>{{ $task->status }}</td>
        <tr>
            <th>今日やること</th>
            <td>{{ $task->content }}</td>
        </tr>
    </table>
 {!! link_to_route('tasks.edit', 'タスク内容を編集', ['id' => $task->id], ['class' => 'btn btn-light']) !!}

    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection
