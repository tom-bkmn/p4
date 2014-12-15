@extends('_master')

@section('title')
    TBen's Blog
@stop

@section('landingPageIntro')
This is the replies page.  All discussion for the currently selected topic takes place here.  Comments may also be posted for specific replies.
@stop

@section('bodyContent')
    <div>
        <?php
        $topic = DB::table('topics')->where('id', $topicNumber) ->first();
        $user = DB::table('users')->where('id', $topic->author_id)->first();
        $replies = DB::table('replies')->where('topic_id', $topicNumber)->get();
        ?>
        <br>
        Topic:  {{$topic->topic_name}}  <br>
        Description:  {{$topic->topic_content}}  <br>
        Author:  {{$user->user_name}} <br>
        <?php $stamp = date('M d Y', strtotime($topic->created_at))  ?>
        Created on: {{$stamp }} <br><br>
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
                <?php $stamp2 = date('M d Y', strtotime($reply->created_at))  ?>
                Created on:  {{$stamp2}} <br>
                <a href="/createComment/{{$reply->id}}">Comment on this reply</a> <br>
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


