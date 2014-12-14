@extends('_usermaster')

@section('title')
    TBen's Blog
@stop

@section('bodyContent')
    <div class="login">
        @if(Session::get('flash_message'))
            <div class='flash-message'>{{ Session::get('flash_message') }}</div>
            @foreach($errors->all() as $message)
                <div class='error'>{{ $message }}</div>
            @endforeach
        @endif 
        <h1>Sign up for TBen's Blogs</h1>
        {{ Form::open(array('url' => '/signup')) }}
            Email:<br>
            {{ Form::text('email') }}<br><br>
            Password:<br>
            {{ Form::password('password') }}<br><br>
            User name:<br>
            {{ Form::text('user_name') }}<br><br>    
            {{ Form::submit('Submit') }}
        {{ Form::close() }}
        <br>
        Or login here: 
        <a href="/login">login</a>
    </div>
@stop