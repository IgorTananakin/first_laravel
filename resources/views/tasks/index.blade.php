@extends('layouts.main')

@section('content')
<div class="container mt-2">

    @include('common.errors')

    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-body">
                    <form action="{{ url('task') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="control-label">Задача</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group mb-0">
                            <div class="w-100">
                                <button type="submit" class="btn btn-primary">Добавить задачу</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-header">Текущие задачи</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td>
                                <a href="{{ url('task/'.$task->id) }}">
                                    {{ $task->name }}
                                </a>
                            </td>

                            <td>
                                @if($task->status)
                                    {{ $task->status['name'] }}
                                @endif
                            </td>

                            <td>
                                <form id="taskform-{{$task->id}}" action="{{ url('task/'.$task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="button" onclick="clickDelButton(event, 'taskform-{{$task->id}}')" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection