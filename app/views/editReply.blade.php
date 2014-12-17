@extends('_replymaster')

@section('title')
    TBen's Blog
@stop

@section('intro')
    Administrator Page: This is where you can edit a user's reply.      
@stop

@section('entries')
   <?php $reply = DB::table('replies')->where('id', $replyNumber)->first(); ?>
    Date:  {{$reply->created_at}} <br><br>
    You are editing this reply: <br><br>
@stop

@section('form')

{{ Form::model($reply, ['method' => 'put', 'action' => ['RepliesController@update', $replyNumber]]) }}
    {{Form::textarea('editedReply', $reply->content);}}
    {{Form::hidden('topicNumber', $reply->topic_id);}}
    {{ Form::submit('Update') }}
{{ Form::close() }}

@stop


