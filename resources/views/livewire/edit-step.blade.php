<div>
    <div class="d-flex align-items-center justify-content-between">
        <h2>Add step if required</h2>
        <span wire:click="increment" class="btn cursor-pointer">
            <i class="fas fa-plus text-info">
            </i>
        </span>
    </div>

    @foreach($steps as $step)
        <div class="form-group justify-content-between" wire:key="{{ $loop->index }}">
            <label for="step">Step {{ $loop->index+1 }}: </label>
            <input type="text" name="stepName[]" value="{{$step['name']}}">
            <input type="hidden" name="stepId[]" value="{{$step['id']}}">
            <span wire:click="remove({{ $loop->index }})" class="mr-3 float-right" style="cursor:pointer">
                <p class="text-danger font-weight-bold" style="font-size:1rem">X</p>
            </span>
        </div>
    @endforeach

</div>
