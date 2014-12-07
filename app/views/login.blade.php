@extends('_usermaster')

@section('title')
    TBen's Blog
@stop

@section('bodyContent')
    <div class="login">
        @foreach($errors->all() as $message)
            <div class='error'>{{ $message }}</div>
        @endforeach
        <h1>Log into TBen's Blogs</h1>
        {{ Form::open(array('url' => '/login')) }}
            Email:<br>
            {{ Form::text('email') }}<br><br>
            Password:<br>
            {{ Form::password('password') }}<br><br>
            {{ Form::submit('Submit') }}
        {{ Form::close() }}
    </div>
@stop
