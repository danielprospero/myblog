
@props(['name', 'placeholder' => '', 'cols' => '', 'rows' => '', 'value'])
<textarea required id="{{ $name }}" name="{{ $name }}" class="form-control" placeholder="{{ $placeholder}}">{{ $value }}</textarea>

@error($name)
    <div class="alert alert-danger">{{ $message }}</div>
@enderror