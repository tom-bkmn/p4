@extends('_master')

@section('title')
    TBen's Blog
@stop

@section('landingPageIntro')
Welcome to TBen's Forums, a place for discussion.  <br>
See a topic you like? Select the link for that topic and add your .02.  Don't see a topic that catches your interest? Select the Create a Topic link and begin.
@stop

@section('bodyContent')
    @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif
    <br>
    Here are a list of current topics for discussion...
    <br>
    <br>
    @foreach ($topics as $topic) 
        <div class="list">
            <a href="/replies/{{$topic->id}}">Topic: {{$topic->topic_name}}</a>
            <br>
            Description:  {{$topic->topic_content}} <br>
            <?php $user = DB::table('users')->where('id', $topic->author_id)->first(); ?>
            Author:  {{$user->user_name}} <br>
            Created on:  {{$topic->created_at }} <br>
            <a href="/delete/{{$topic->id}}">Delete this topic</a>
        </div>
    @endforeach

@stop


