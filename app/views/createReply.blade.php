@extends('_replymaster')

@section('title')
    TBen's Blog/Forum Deluxe
@stop

@section('intro')
    This is where you can supply a reply to a topic.     
@stop

@section('entries')
    <div>
        <?php
            $topic = DB::table('topics')->where('id', $topicNumber) ->first();
            $user = DB::table('users')->where('id', $topic->author_id)->first();
        ?>
        Topic:  {{$topic->topic_name}} <br><br>
        Description:  {{$topic->topic_content}}  <br><br>
        Author:  {{$user->user_name}} <br>
        Date:  {{$topic->created_at}} 
        <br><br>
    </div>
@stop

@section('form')
    @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
        <br>
    @endif 
    
    <h4>
        <div>
            {{Form::open(array('url' => "createReply", 'method'=>'POST', 'files'=> true))}}
            {{Form::label('your reply')}}<br>
            {{Form::textarea('replyContent')}}<br>
            {{Form::hidden('topicNum', $topicNumber)}}
            {{Form::label('Image upload')}}<br>
            {{Form::file('picture')}}
            {{Form::submit('Submit')}}
            {{Form::close()}}
        </div>
    </h4>
@stop


