<div>
    <div class="captcha">
        <span wire:ignore>{!! captcha_img('math') !!}</span>
        <button wire:click.prevent="reload" id="reload" type="button" class="btn btn-danger reload">
            &#X21bb;
        </button>
        @error('captcha')
            {{$message}}
        @enderror
        <input type="text" id="name" wire:model='captcha' name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">

    </div>
</div>
