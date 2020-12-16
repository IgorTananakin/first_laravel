@extends('layouts.main')

@section('content')
<div class="container mt-2">

    @include('common.errors')

    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-body">
                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="control-label">Задача</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}">
                        </div>

                        <div class="form-group">
                            <label for="status" class="control-label">Статус задачи</label>
                            <select class="form-control custom-select" name="status" id="status">
                            @foreach($statuses as $status)
                            <option value="{{$status->id}}"
                                @if($status->id == $task->status['id']) selected='select'
                                @endif >
                                {{$status->name}}
                            </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-0">
                            <div class="w-100">
                                <a href="{{ url('/') }}" class="btn btn-light">Назад</a>
                                <button type="submit" class="btn btn-success">Сохранить задачу</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <span class="float-left">Группы исполнителей</span>
                    <span class="float-right">
                        <button class="btn btn-sm btn-dark" data-toogle="modal" data-target="#addModal">Добавить</button>
                    </span>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->name }}</td>
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