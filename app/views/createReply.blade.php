@extends('_replymaster')

@section('title')
    TBen's Blog/Forum Deluxe
@stop

@section('intro')
    This is where you can supply a reply to the topic.  Hit submitt after completing your rant.        
@stop

@section('entries')
<?php 
    echo "Topic number:  " . $topicNumber ;
    echo "<br>";
    $topic = DB::table('topics')->where('id', $topicNumber) ->first();
    $user = DB::table('users')->where('id', $topic->author_id)->first();
    echo "<br>";
    echo "Topic: " . $topic->topic_name . "<br>";
    echo "Description: " . $topic->topic_content . "<br>";
    echo "Author: " . $user->user_name . "<br>";
    echo "Date:  " . $topic->created_at . "<br><br>";
    echo "<a href=\"/createReply/$topicNumber\">Reply to this topic</a>" . "<br><br>";
    echo "Here are the replies to this topic." . "<br><br>";
?>
@stop

@section('form')
<?php  
    echo "Topic Number:  " . $topicNumber;
    echo Form::open(array('url' => "createReply", 'method'=>'POST'));
    echo Form::textarea('replyContent');
    echo "<br>";
    echo Form::hidden('topicNum', $topicNumber);
    echo Form::submit('Submit');
    Form::close();
?>
@stop


