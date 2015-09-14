@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('users.headtitle') }}
@stop

@section('title')
    {{ Lang::get('users.add') }}
@stop

@section('content')
    <div class="col-xs-12 col-md-6 col-md-offset-3">
    {{ Form::open(array('route' => 'admin.users.create')) }}
        <div class="form-group">
            {{ $errors->first('name') }}
            {{ $errors->first('email') }}
            {{ $errors->first('level') }}
            {{ $errors->first('password') }}
        </div>
        <div class="form-group">
            {{ Form::label('name', Lang::get('users.name'), array('class' => 'control-label')) }}
            {{ Form::text('name', Input::old('name') , array('placeholder' => 'Naam...', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', Lang::get('users.email'), array('class' => 'control-label')) }}
            {{ Form::text('email', Input::old('email'), array('placeholder' => 'naam@domein.nl', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', Lang::get('users.password'), array('class' => 'control-label')) }}
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('password_confirmation', Lang::get('users.password_confirm'), array('class' => 'control-label')) }}
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('level', Lang::get('users.level'), array('class' => 'control-label')) }}
            {{ Form::text('level', Input::old('level') ? Input::old('level') : 1, array('value' => 1, 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::button(Lang::get('admin.action_save'), array('class' => 'btn btn-primary', 'type' => 'submit')) }}
            <a href="{{ URL::route('admin.users.index') }}">{{ Lang::get('admin.action_cancel') }}</a>
        </div>

    {{ Form::close() }}
    </div>
@stop