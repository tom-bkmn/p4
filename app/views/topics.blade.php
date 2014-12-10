@extends('_master')

@section('title')
    TBen's Blog
@stop

@section('landingPageIntro')
    @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif
    <br>
    See a topic you like? Select the link for that topic and add your .02.  Don't see a topic that catches your interest? Select the Create a Topic link and begin. <br>
    <br>
    Just be nice, ok?  The idea is to blog, not bludgeon.
@stop

@section('bodyContent')

    <br>
    Here are a list of current topics for discussion...
    <br>
    <br>
    <?php $adminCheck = Auth::user()->is_admin; ?>

    @foreach ($topics as $topic) 
        <div class="list">
            <a href="/replies/{{$topic->id}}">Topic: {{$topic->topic_name}}</a>
            <br>
            Description:  {{$topic->topic_content}} <br>
            <?php $user = DB::table('users')->where('id', $topic->author_id)->first(); ?>
            Author:  {{$user->user_name}} <br>
            Created on:  {{$topic->created_at }} <br>
            <!-- Only offer the option to delete if the current user is an admin -->
            @if($adminCheck)
                <a href="/delete/{{$topic->id}}">Delete this topic</a>
            @endif
        </div>
    @endforeach

@stop


