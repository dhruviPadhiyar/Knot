@props(['name','class'=>'form-label'])
{{-- <label for="{{ $name }}" class="form-label">{{ $name }}</label> --}}

<label for="{{$name}}" class="{{ $class }}">{{ ucwords($name) }}</label>
