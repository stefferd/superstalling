@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('settings.headtitle') }}
@stop

@section('title')
    {{ Lang::get('settings.edit') }}
@stop

@section('content')
    <div class="col-xs-12 col-md-6 col-md-offset-3">
    {{ Form::model($setting, array('route' => array('admin.settings.update', $setting->id))) }}
        <div class="form-group">
            {{ Form::label('value', $setting->key, array('class' => 'control-label')) }}
            {{ Form::text('value', null, array('placeholder' => 'Gewenste waarde', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::button(Lang::get('admin.action_save'), array('class' => 'btn btn-primary', 'type' => 'submit')) }}
            <a href="{{ URL::route('admin.settings.index') }}">{{ Lang::get('admin.action_cancel') }}</a>
        </div>
    {{ Form::close() }}
    </div>
@stop