@extends('_replymaster')

@section('title')
    TBen's Blog
@stop

@section('intro')
    This is where you can supply a comment to a reply.
@stop

@section('entries')
    <div>
        <?php
            $reply = DB::table('replies')->where('id', $replyNumber)->first();
            $topic = DB::table('topics')->where('id', $reply->topic_id) ->first();
            $user = DB::table('users')->where('id', $reply->author_id)->first();
        ?>
        Topic:  {{$topic->topic_name}} <br>
        Description: {{$topic->topic_content}} <br>
        Author:  {{$user->user_name}} <br>
        <?php $stamp = date('M d Y', strtotime($topic->created_at))  ?>
        Created on:  {{$stamp}} <br><br>
        You are commenting on this reply: <br>
        {{$reply->content}}
    </div>
@stop

@section('form')
    @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}<br></div>
    @endif 
    <div>
        {{Form::open(array('url' => "createComment", 'method'=>'POST'))}}
            {{Form::textarea('commentContent')}}
            <br>
            {{Form::hidden('replyNum', $replyNumber)}}
            {{Form::hidden('topicNum', $topic->id)}}
            {{Form::submit('Submit')}}
        {{Form::close()}}
    </div>
@stop