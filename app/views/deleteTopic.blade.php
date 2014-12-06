@extends('_master')

@section('title')
    TBen's Blog
@stop

@section('landingPageIntro')
Administrator Page:  If you are sure you want to delete this topic and all its contents hit the nuke button
@stop

@section('bodyContent')
 <?php $topic = DB::table('topics')->where('id', $topicNumber) ->first(); ?>
  Topic name: {{$topic->topic_name}}

{{ Form::open(['method' => 'DELETE', 'action' => ['TopicsController@destroy', $topicNumber]]) }}
    <a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
{{ Form::close() }}
@stop




