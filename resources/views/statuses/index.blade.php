@extends('layouts.main')

@section('content')
<div class="container mt-2">

    @include('common.errors')

    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-body">
                    <form action="{{ url('status') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="control-label">Статус</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group mb-0">
                            <div class="w-100">
                                <button type="submit" class="btn btn-primary">Добавить</button>
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
                <div class="card-header">Статусы</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        @foreach($statuses as $status)
                        <tr>
                            <td>
                                <a href="{{ url('status/'.$status->id) }}">
                                    {{ $status->name }}
                                </a>
                            </td>
                            <td>
                                <form id="statform-{{$status->id}}" action="{{ url('status/'.$status->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="button" onclick="clickDelButton(event, 'statform-{{$status->id}}')" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $statuses->links('vendor.pagination.bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection