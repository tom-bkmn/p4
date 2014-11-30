@extends('_master')

@section('title')
    TBen's Blog
@stop

@section('landingPageIntro')
This is the replies page.  All the discussion takes place here.  Also, comments can be posted against specific replies.
@stop

@section('bodyContent')
<br>
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


