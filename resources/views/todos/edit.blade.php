@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
               
                <form action="{{ route('todo.update', $todo->id) }}" method="POST" class="shadow p-5">
                    <div class="d-flex align-items-center justify-content-between" style="">
                        <h2>Update A Task</h2>
                        <a href="{{ route('todo.index') }}" class="btn"><i class="fas fa-angle-double-left text-info"></i></a>
                    </div>
                    @csrf
                    @method('PUT')
                    <x-alert />
                    <div class="form-group">
                        <label for="title">Title: </label>
                        <input type="text" name="title" value="{{ $todo->title }}"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description: </label>
                        <textarea name="description" id="description" 
                            cols="20" rows="10" 
                                class="form-control" >{{ $todo->description }}</textarea>
                    </div>
                    @livewire('edit-step', ['steps' => $todo->steps])
                    <button type="submit" class="btn btn-info btn-block">
                        Update
                    </button>
                    
                </form>
            </div>
        </div>
    </div>
@endsection