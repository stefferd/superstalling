@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('users.headtitle') }}
@stop

@section('title')
    {{ Lang::get('users.edit') }}
@stop

@section('content')
    <div class="col-xs-12 col-md-6 col-md-offset-3">
    {{ Form::open(array('route' => array('admin.users.update', $user->id))) }}
        <div class="form-group">
            {{ $errors->first('name') }}
            {{ $errors->first('email') }}
            {{ $errors->first('level') }}
        </div>
        <div class="form-group">
            {{ Form::label('name', Lang::get('users.name'), array('class' => 'control-label')) }}
            {{ Form::text('name', Input::old('name') ? Input::old('name') : $user->name, array('placeholder' => 'naam@domein.nl', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', Lang::get('users.email'), array('class' => 'control-label')) }}
            {{ Form::text('email', Input::old('email') ? Input::old('email') : $user->email, array('placeholder' => 'naam@domein.nl', 'class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('level', Lang::get('users.level'), array('class' => 'control-label')) }}
            {{ Form::text('level', Input::old('level') ? Input::old('level') : $user->level, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::button(Lang::get('admin.action_save'), array('class' => 'btn btn-primary', 'type' => 'submit')) }}
            <a href="{{ URL::route('admin.users.index') }}">{{ Lang::get('admin.action_cancel') }}</a>
        </div>
    {{ Form::close() }}
    </div>
@stop