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
        <a href="/replyForm/{{$topicNumber}}">Reply to this topic</a>
        <a href="/topics">Return to topic list</a>
        <br><br>
        @if (sizeof($replies) < 1)
              There are no replies to this topic.
        @else
              Here are the replies to this topic. 
        @endif
        <br><br>

         <?php $adminCheck = Auth::user()->is_admin; ?>
        @foreach (array_reverse($replies) as $reply) 
            <div  class="list">
                <?php $author = DB::table('users')->where('id', $reply->author_id)->first() ?>
                {{$author->user_name}} wrote: <br>
                {{$reply ->content}} <br><br>
                created on:  {{$reply->created_at}} <br>
                <a href="/createComment/{{$reply->id}}">Comment on this reply</a> <br><br>
                <!-- Only offer the option to delete if the current user is an admin -->
                @if($adminCheck)
                    <a class="test" href="/editForm/{{$reply->id}}">Edit this reply</a> <br>
                @endif
                <?php $comments = DB::table('comments')->where('reply_id', $reply->id)->get() ?>
                @foreach (array_reverse($comments) as $comment) 
                      <div class="indent">
                          Comment:  {{$comment ->content}} <br><br>
                          <?php $commentAuthor = DB::table('users')->where('id', $comment->author_id)->first() ?>
                          Author:  {{$commentAuthor->user_name}} <br>
                     </div>
                @endforeach
            </div> 
        @endforeach
    </div>
@stop


