@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('news.headtitle') }}
@stop

@section('title')
    {{ Lang::get('news.add') }}
@stop

@section('content')
    <div class="col-xs-12">
    {{ Form::open(array('route' => 'admin.news.create')) }}
        <div class="form-group">
            {{ Form::label('title', Lang::get('news.title'), array('class' => 'control-label')) }}
            {{ Form::text('title', Input::old('title') , array('placeholder' => 'Nieuws titel', 'class' => 'form-control')) }}
            {{ $errors->first('title') }}
        </div>
        <div class="form-group">
            {{ Form::label('content', Lang::get('news.content'), array('class' => 'control-label')) }}
            {{ Form::textarea('content', Input::old('content'), array('placeholder' => 'Inhoud van het bericht', 'class' => 'form-control')) }}
            {{ $errors->first('content') }}
        </div>
        <div class="form-group">
            {{ Form::label('active', Lang::get('news.active'), array('class' => 'control-label')) }}
            {{ Form::checkbox('active', 1 , Input::old('active')) }}
        </div>
        <div class="form-group">
            {{ Form::button(Lang::get('admin.action_save'), array('class' => 'btn btn-primary', 'type' => 'submit')) }}
            <a href="{{ URL::route('admin.news.index') }}">{{ Lang::get('admin.action_cancel') }}</a>
        </div>
    {{ Form::close() }}
    </div>
@stop