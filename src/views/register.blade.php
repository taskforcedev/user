@extends($layout)

@section($section)

@if(isset($flash))
<div class="{{ $flash_type }}">{{ $flash }}</div>
@endif

{{ Form::open(array('url' => 'register')) }}

@foreach ($fields as $field => $type)
    <?php $field_display = ucwords($field); ?>
    {{ Form::label($field, $field_display, array('class' => 'label')) }}

    @if ($type == 'text')
        {{ Form::text($field, null, array('class' => 'form-control', 'placeholder' => $field)) }}
    @elseif ($type == 'password')
        {{ Form::password($field, array('class' => 'form-control', 'placeholder' => $field)) }}
    @endif

@endforeach

{{ Form::submit('Register') }}

{{ Form::close() }}

@stop