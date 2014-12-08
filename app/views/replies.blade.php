@extends('_master')

@section('title')
    TBen's Blog
@stop

@section('landingPageIntro')
This is the replies page.  All the discussion takes place here.  Also, comments can be posted against specific replies.
@stop

@section('bodyContent')
    <div>
        <br>
        Topic number:  {{$topicNumber }};
        <br>
        <?php
        $topic = DB::table('topics')->where('id', $topicNumber) ->first();
        $user = DB::table('users')->where('id', $topic->author_id)->first();
        $replies = DB::table('replies')->where('topic_id', $topicNumber)->get();
        ?>
        <br>
        Topic:  {{$topic->topic_name}}  <br>
        Description:  {{$topic->topic_content}}  <br>
        Author:  {{$user->user_name}} <br>
        Date:  {{$topic->created_at}} <br><br>
        <a href="/createReply/{{$topicNumber}}">Reply to this topic</a>
        <a href="/topics">Return to topic list</a>
        <br><br>
        @if (sizeof($replies) < 1)
              There are no replies to this topic.
        @else
              Here are the replies to this topic. 
        @endif
        <br><br>

        @foreach ($replies as $reply) 
            <div  class="list">
                <?php $author = DB::table('users')->where('id', $reply->author_id)->first() ?>
                {{$author->user_name}} wrote: <br>
                {{$reply ->content}} <br>
                created on:  {{$reply->created_at}} <br>
                <a href="/createComment/{{$reply->id}}">Comment on this reply</a> <br>
                <a class="test" href="/editReply/{{$reply->id}}">Edit this reply</a> <br>
                <?php $comments = DB::table('comments')->where('reply_id', $reply->id)->get() ?>
                @foreach ($comments as $comment) 
                    >>>>>>>> Comment:  {{$comment ->content}} <br>
                    <?php $commentAuthor = DB::table('users')->where('id', $comment->author_id)->first() ?>
                    >>>>>>>> Author:  {{$commentAuthor->user_name}} <br>
                @endforeach
            </div> 
        @endforeach
    </div>
@stop


