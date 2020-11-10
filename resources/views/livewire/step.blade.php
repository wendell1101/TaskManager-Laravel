<div>
    <div class="d-flex align-items-center justify-content-between">
        <h5>Add step if required</h5>
        <span wire:click="increment" class="btn cursor-pointer">
            <i class="fas fa-plus text-info">
            </i>
        </span>
    </div>
       
    @foreach($steps as $step)
        <div class="form-group justify-content-between" wire:key="{{ $step }}">
            <label for="step">Step {{ $step+1 }}: </label>
            <input type="text" name="step[]" class="border-rounded">
            <span wire:click="remove({{ $step }})" class="mr-3 float-right" style="cursor:pointer">
                
                
                <p class="text-danger font-weight-bold" style="font-size:1rem">X</p>
            </span>
        </div>
    @endforeach
</div>