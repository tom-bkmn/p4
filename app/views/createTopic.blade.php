@extends('_topicmaster')

@section('title')
    TBen's Blog/Forum Deluxe
@stop

@section('intro')
  This is the page where you create a topic. 
@stop

@section('form')
{{ Form::open(array('url' => 'createTopic', 'method'=>'POST'))}}
    {{Form::label('topicTitle', ' Enter a topic title.')}}
    <br>
    {{Form::text('topicTitle')}}
    <br>
    <br>
    {{Form::label('topicDescription', ' Enter a topic description. ')}}
    <br>
    {{Form::textarea('topicDescription')}}
    <br>
{{Form::file('image') }}
    {{ Form::submit('Submit') }}
{{ Form::close() }}
@stop


