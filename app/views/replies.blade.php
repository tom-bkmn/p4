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
        $replies = DB::table('replies')->where('topic_id', $topicNumber)->get();
        echo "<br>";
        echo "Topic: " . $topic->topic_name . "<br>";
        echo "Description: " . $topic->topic_content . "<br>";
        echo "Author: " . $user->user_name . "<br>";
        echo "Date:  " . $topic->created_at . "<br><br>";
        echo "<a href=\"/createReply/$topicNumber\">Reply to this topic</a>" . "<br><br>";
        echo "Here are the replies to this topic." . "<br><br>";
        #$replies = Reply::with('topicspt')->get();
        
        foreach ($replies as $reply) {
            $author = DB::table('users')->where('id', $reply->author_id)->first();
            echo $author->user_name . " wrote: <br>";
            echo $reply ->content . "<br>";
            echo "created on: " . $reply->created_at . "<br>";
            echo "<a href=\"/createComment/$reply->id\">Comment on this reply</a>" . "<br>";
            echo "<a class=\"test\" href=\"/editReply/$reply->id\">Edit this reply</a>";
            echo "<br>";
            $comments = DB::table('comments')->where('reply_id', $reply->id)->get();
            foreach ($comments as $comment) {
                   echo ">>>>>>>> Comment: " . $comment ->content . "<br>"; 
                   $commentAuthor = DB::table('users')->where('id', $comment->author_id)->first();
                   echo ">>>>>>>> Author: " . $commentAuthor->user_name . "<br>";
            }
            echo "<br><br>"; 
        }

#var_dump($replies);
        
?>

@stop


