@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('news.headtitle') }}
@stop

@section('title')
    {{ Lang::get('news.edit') }}
@stop

@section('content')
    <div class="col-xs-12">
    {{ Form::model($page, array('route' => array('admin.news.update', $page->id))) }}
        <div class="form-group">
            {{ Form::label('title', Lang::get('news.title'), array('class' => 'control-label')) }}
            {{ Form::text('title', null, array('placeholder' => 'Nieuws titel', 'class' => 'form-control')) }}
            {{ $errors->first('title') }}
        </div>
        <div class="form-group">
            {{ Form::label('content', Lang::get('news.content'), array('class' => 'control-label')) }}
            {{ Form::textarea('content', null, array('placeholder' => 'Inhoud van de bericht', 'class' => 'form-control')) }}
            {{ $errors->first('content') }}
        </div>
        <div class="form-group">
            {{ Form::label('active', Lang::get('news.active'), array('class' => 'control-label')) }}
            {{ Form::checkbox('active') }}
        </div>
        <div class="form-group">
            {{ Form::button(Lang::get('admin.action_save'), array('class' => 'btn btn-primary', 'type' => 'submit')) }}
            <a href="{{ URL::route('admin.news.index') }}">{{ Lang::get('admin.action_cancel') }}</a>
        </div>
    {{ Form::close() }}
    </div>
@stop