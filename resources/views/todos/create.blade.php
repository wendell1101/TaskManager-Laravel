@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">

            <form action="{{ route('todo.store') }}" method="POST" class="shadow p-5">
                <div class="d-flex align-items-center justify-content-between">
                    <h2>Create A Task</h2>
                    <a href="{{ route('todo.index') }}" class="btn"><i class="fas fa-angle-double-left text-info"></i></a>
                </div>
                @csrf
                <x-alert />
                <div class="form-group">
                    <label for="title">Title: </label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description: </label>
                    <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                </div>
                @livewire('step')
                <button type="submit" class="btn btn-info btn-block">
                    Create Task
                </button>

            </form>
           
        </div>
    </div>
</div>
@endsection