@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto shadow p-3">

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="d-flex text-capitalize align-items-center"> <span class="mr-2" style="font-size:1rem">Title:   </span>{{ $todo->title }}</h2>
                </div>
               
                <a href="{{ route('todo.index' )}}" class="btn shadow"> <i class="fas fa-angle-double-left text-info"></i></a>
            </div>
            <p>Description: {{ $todo->description }}</p>
            @if($todo->steps->count() > 0)
                Steps: 
                <ul>
                    @foreach($todo->steps as $step)
                    <li>{{ $step->name    }}</li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
</div>
@endsection