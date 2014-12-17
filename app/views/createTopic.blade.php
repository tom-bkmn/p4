@extends('_topicmaster')

@section('title')
    TBen's Blog
@stop

@section('intro')
  Provide the name of the topic and description.
@stop

@section('form')
    @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}
            @foreach($errors->all() as $message)
                <div class='error'>{{ $message }}</div>
            @endforeach
        </div>
        <br>
    @endif 
    <div>
    {{ Form::open(array('url' => 'createTopic', 'method'=>'POST'))}}
      {{Form::label('topicTitle', ' Enter a topic title.')}}<br>
      {{Form::text('topicTitle')}}<br><br>
      {{Form::label('topicDescription', ' Enter a topic description. ')}}<br>
      {{Form::textarea('topicDescription')}}<br>
      {{Form::submit('Submit')}}
  {{ Form::close() }}
   </div>
@stop


