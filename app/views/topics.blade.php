@extends('_master')

@section('title')
    TBen's Blog
@stop

@section('landingPageIntro')
Welcome to TBen's Forums, a place for discussion.  See a topic you like? Select the link for that topic and add your .02.  Don't see a topic that catches your interest? Select the Create a Topic link and begin.
@stop

@section('bodyContent')
Here are a list of current topics for discussion...
<br>
<br>
<?php 
    foreach ($topics as $topic) {
       //var_dump($topic);  
       echo "<a href=\"/replies/$topic->id\">Topic: $topic->topic_name</a>";
       echo "<br>";
       echo "Description: " . $topic->topic_content . "<br>";
       $user = DB::table('users')->where('id', $topic->author_id)->first();
       echo "Author name: " . $user->user_name . "<br>";
       echo "Created on: " . $topic->created_at . "<br>";
       echo "<a href=\"/delete/$topic->id\">Delete this topic</a>";
       echo "<br>";
       echo "<br>";
    }

?>
@stop


