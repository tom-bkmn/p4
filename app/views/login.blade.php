@extends('_usermaster')

@section('title')
    TBen's Blog
@stop

@section('bodyContent')
    <div class="login">
        <h1>Log into TBen's Blogs</h1>
        @if(Session::get('flash_message'))
            <div class='flash-message'>{{ Session::get('flash_message') }}</div>
        @endif 
        {{ Form::open(array('url' => '/login')) }}
        <div>
            {{ Form::label('email')}}<br>
            {{ Form::text('email') }}<br><br>
            {{ Form::label('password') }}<br>
            {{ Form::password('password') }}<br><br>
            {{ Form::submit('Submit') }}
        </div>
        {{ Form::close() }}
        <br>
        Or sign up for an account here: 
        <a href="/signup">signup</a>
    </div>
@stop
