@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto bg-light shadow text-dark p-4">
            <x-alert />
            <div class="d-flex justify-content-between align-items-center">
                <h2>TodoList</h2>
                <a href="{{ route('todo.create' )}}" class="btn shadow"> <i class="fas fa-plus text-info"></i></a>
            </div>

            <ul class="list-group ">
                @forelse($todos as $todo)
                <li class="list-group-item d-flex text-capitalize mask flex-center rgba-red-strong">
                    @if($todo->completed)
                    <del><a href="{{ route('todo.show', $todo->id) }}" class="" style="font-size:1.3rem">{{ $todo->title }}</a></del>
                    @else
                    <a href="{{ route('todo.show', $todo->id) }}" style="font-size:1.3rem">{{ $todo->title }}</a>
                    @endif
                    <div class="ml-auto inline">
                        <a href="{{ route('todo.show', $todo->id) }}" class="ml-1 mr-2">
                            <i class="fas fa-eye text-secondary"></i>
                        </a>
                        <a href="{{ route('todo.edit', $todo->id) }}" class="ml-1 mr-2">
                            <i class="fas fa-edit text-warning"></i>
                        </a>
                        <span onclick="event.preventDefault();document.getElementById('form-delete-{{$todo->id}}').submit();" class="fas fa-trash text-danger ml-1 mr-2" style="cursor:pointer">
                            <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" id="{{ 'form-delete-'.$todo->id }}">
                                @csrf
                                @method('delete')
                            </form>
                        </span>
                        @include('todos.completeButton')
                    </div>
                </li>
                @empty
                <h3 class="text-lead text-center text-muted">No Task Yet</h3>
                @endforelse
            </ul>

        </div>
    </div>


</div>

@endsection