@extends('layouts.app')

@section('title')
    To-do List
@endsection

@section('content')
    <h1 class="text-center my-5">TODOS PAGE</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Todos
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($todos as $todo)
                            <li class="list-group-item">
                                {{ $todo->name }}
                                @if ($todo->completed)
                                    <span class="badge badge-success float-right">Concluído</span>
                                    <a href="{{ route('todo.redo', $todo->id) }}"
                                        class="btn btn-info btn-sm float-right">Refazer</a>
                                @elseif(!$todo->completed)
                                    <a href="{{ route('todo.complete', $todo->id) }}"
                                        class="btn btn-warning btn-sm float-right mr-2">Concluir</a>
                                @endif
                                <a href="{{ route('todo.show', $todo->id) }}"
                                    class="btn btn-primary btn-sm float-right">Detalhar</a>


                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
