@extends('layouts.app')

@section('title')
    Single Todo: {{ $todo->name }}
@endsection

@section('content')
    <h1 class="text-center my-5">
        {{ $todo->name }}
    </h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    Details
                </div>
                <div class="card-body">
                    {{ $todo->description }}
                </div>
            </div>
            <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-info btn-sm my-2">Editar</a>
            <a href="{{ route('todo.delete', $todo->id) }}" class="btn btn-danger btn-sm my-2">Remover</a>
        </div>
    </div>
@endsection
