@extends('admin.layouts.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3 well">
                {{ Form::open(array('route' => 'admin.authenticate')) }}
                    <h2>Inloggen</h2>
                    <div class="form-group">
                        {{ $errors->first('email') }}
                        {{ $errors->first('password') }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', 'E-mailadres', array('class' => 'control-label')) }}
                        {{ Form::text('email', Input::old('email'), array('placeholder' => 'naam@domein.nl', 'class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'Wachtwoord', array('class' => 'control-label')) }}
                        {{ Form::password('password', array('class' => 'form-control')) }}
                    </div>
                    <p>{{ Form::button('Inloggen', array('class' => 'btn btn-primary', 'type' => 'submit')) }}</p>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop