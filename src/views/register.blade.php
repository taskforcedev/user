@extends($layout)

@section('content')

@if(isset($flash))
<div class="{{ $flash_type }}">{{ $flash }}</div>
@endif

<form action="{{ route('laravel-user.registration') }}" method="POST">

<h1>Register</h1>

@foreach ($fields as $field => $type)
    <?php
        $field_display = str_replace('_', ' ', $field);
        $field_display = ucwords($field_display);
    ?>

    <label class="label" for="{{ $field_display }}">{{ $field_display }}</label>

    @if ($type == 'text')
        <input class="form-control" type="text" name="{{ $field }}" placeholder="{{ $field_display }}" />
    @elseif ($type == 'password')
        <input class="form-control" type="password" name="{{ $field }}" placeholder="{{ $field_display }}" />
    @endif

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

@endforeach
<br/>
<input type="submit" value="Register" class="btn btn-success" />

</form>

@stop
