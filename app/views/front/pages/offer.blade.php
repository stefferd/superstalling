@extends('front.layouts.layout')

@section('meta'){{ $page->title }}@stop

@section('keywords'){{ $page->keywords }}@stop

@section('description'){{ $page->description }}@stop

@section('title'){{ $page->title }}@stop

@section('content')
    <ol class="breadcrumb">
      <li><a href="/" title="Superstalling">Home</a></li>
      <li class="active">{{ $page->title }}</li>
    </ol>
    {{ $page->content }}
    @if (!isset($message))
        {{ Form::open(array('route' => array('front.sendOffer'))) }}
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('Naam', array('class' => 'form-label')) }}
                    {{ Form::text('name', null, array('placeholder' => 'Naam', 'class' => 'form-control')) }}
                    {{ $errors->first('name') }}
                </div>
                <div class="form-group">
                    {{ Form::label('Adres', array('class' => 'form-label')) }}
                    {{ Form::text('address', null, array('placeholder' => 'Adres', 'class' => 'form-control')) }}
                    {{ $errors->first('address') }}
                </div>
                <div class="form-group">
                    {{ Form::label('Postcode + woonplaats', array('class' => 'form-label')) }}
                    <div class="col-xs-3">
                        {{ Form::text('postcode', null, array('placeholder' => 'Postcode', 'class' => 'form-control')) }}
                        {{ $errors->first('postcode') }}
                    </div>
                    <div class="col-xs-3 col-xs-offset-6">
                        {{ Form::text('city', null, array('placeholder' => 'Plaats', 'class' => 'form-control')) }}
                        {{ $errors->first('city') }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Telefoon', array('class' => 'form-label')) }}
                    {{ Form::text('phone', null, array('placeholder' => 'Telefoon', 'class' => 'form-control')) }}
                    {{ $errors->first('phone') }}
                </div>
                <div class="form-group">
                    {{ Form::label('Email', array('class' => 'form-label')) }}
                    {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                    {{ $errors->first('email') }}
                </div>
                <div class="form-group">
                    {{ Form::label('Naam van de boot', array('class' => 'form-label')) }}
                    {{ Form::text('boat', null, array('placeholder' => 'Naam van de boot', 'class' => 'form-control')) }}
                    {{ $errors->first('boat') }}
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    {{ Form::text('storage', null, array('placeholder' => 'Stallingstype', 'class' => 'form-control')) }}
                    {{ $errors->first('boat') }}
                </div>
                <div class="form-group">
                    {{ Form::text('boat_length', null, array('placeholder' => 'Lengte', 'class' => 'form-control')) }}
                    {{ $errors->first('boat_length') }}
                </div>
                <div class="form-group">
                    {{ Form::text('boat_width', null, array('placeholder' => 'Breedte', 'class' => 'form-control')) }}
                    {{ $errors->first('boat_width') }}
                </div>
            </div>
        </div>
        <hr />
        <div class="form-group">
            {{ Form::textarea('remarks', null, array('placeholder' => 'Opmerkingen', 'class' => 'form-control')) }}
            {{ $errors->first('remarks') }}
        </div>
        <div class="form-group">
            {{ Form::button('Send', array('class' => 'btn btn-primary', 'type' => 'submit')) }} <small class="text-muted">All fields are required</small>
        </div>
        {{ Form::close() }}
    @else
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@stop