@if($todo->completed)
<span onclick="event.preventDefault();document.getElementById('form-incomplete-{{ $todo->id }}').submit()"
    class="fas fa-check text-success" style="cursor:pointer">
    <form action="{{ route('todo.incomplete',$todo->id) }}" method="POST" 
        id="{{ 'form-incomplete-' . $todo->id }}"
        style="display:none">
        @csrf
        @method('PUT')
    </form>
</span>
@else
<span onclick="event.preventDefault();document.getElementById('form-complete-{{ $todo->id }}').submit()"
    class="fas fa-check text-secondary" style="cursor:pointer">
    <form action="{{ route('todo.complete',$todo->id) }}" method="POST" 
        id="{{ 'form-complete-' . $todo->id }}"
        style="display:none">
        @csrf
        @method('PUT')
    </form>
</span>
@endif