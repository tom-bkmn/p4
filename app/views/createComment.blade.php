@extends('_replymaster')

@section('title')
    TBen's Blog/Forum Deluxe
@stop

@section('intro')
    This is where you can supply a comment to a reply.  Hit submitt.       
@stop

@section('entries')
<?php 
    $reply = DB::table('replies')->where('id', $replyNumber)->first();
    $topic = DB::table('topics')->where('id', $reply->topic_id) ->first();
    $user = DB::table('users')->where('id', $reply->author_id)->first();

    echo "<br>";
    echo "Topic: " . $topic->topic_name . "<br>";
    echo "Description: " . $topic->topic_content . "<br>";
    echo "Author: " . $user->user_name . "<br>";
    echo "Date:  " . $topic->created_at . "<br><br>";
   # echo "<a href=\"/createReply/$topicNumber\">Reply to this topic</a>" . "<br><br>";
    echo "You are commenting on this reply:" . "<br><br>";
    echo $reply->content;
?>
@stop

@section('form')
<?php  
    echo "Reply Number:  " . $replyNumber;
    echo Form::open(array('url' => "createComment", 'method'=>'POST'));
    echo Form::textarea('commentContent');
    echo "<br>";
    echo Form::hidden('replyNum', $replyNumber);
    echo Form::hidden('topicNum', $topic->id);
    echo Form::submit('Submit');
    Form::close();
?>
@stop


