@extends('front.layouts.layout')

@section('meta'){{ $entry->title }} | {{ $page->title }}@stop

@section('keywords'){{ $page->keywords }}@stop

@section('description'){{ $page->description }}@stop

@section('title'){{ $entry->title }}@stop

@section('content')
    <ol class="breadcrumb">
      <li><a href="/" title="Milkim classic cars sells classic cars">Home</a></li>
      <li><a href="/inventory" title="Inventory of Milkim classic cars">Inventory</a></li>
      <li class="active">{{ $entry->title }}</li>
    </ol>
    <div class="row">
        <div class="col-xs-12 col-sm-9">
            <div class="media">
                @foreach ($entry->pictures as $picture)
                    <div class="img">
                        <img src="{{ URL::asset('custom/owner_images/') }}/{{ $entry->id }}/{{ $picture->url }}" class="img-responsive" alt="{{$entry->title}}" />
                    </div>
                @endforeach
            </div>
            <div class="details">
                <h2>&euro; {{ $entry->car->price }}</h2>
                <p>{{ $entry->description }}</p>
                <a class="btn btn-default" href="{{ URL::route('front.inventory') }}">Back to inventory</a>
                <dl class="dl-horizontal">
                    <dt>Inventory #</dt><dd>{{$entry->id }}</dd>
                    <dt>Location</dt><dd>{{ $entry->car->location }}</dd>
                    <dt>Make</dt><dd>{{ $entry->car->make }}</dd>
                    <dt>Brand</dt><dd>{{ $entry->car->brand }}</dd>
                    <dt>Engine</dt><dd>{{ $entry->car->engine }}</dd>
                    <dt>Type</dt><dd>{{ $entry->car->type }}</dd>
                    <dt>Status</dt><dd>{{ $entry->car->status }}</dd>
                    <dt>Millage</dt><dd>{{ $entry->car->milage }}</dd>
                    <dt>Transmission</dt><dd>{{ $entry->car->transmission }}</dd>
                    @if (!empty($entry->car->youtube))
                        <dt>Youtube</dt><dd>{{ $entry->car->youtube }}</dd>
                    @endif
                </dl>
            </div>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="quickcontact">
                @if (!isset($message))
                    {{ Form::open(array('route' => array('front.inventory.contact', $entry->id))) }}
                        <h3>Quick contact</h3>
                        <div class="form-group">
                            {{ Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) }}
                            {{ $errors->first('name') }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('phone', null, array('placeholder' => 'Phonenumber', 'class' => 'form-control')) }}
                            {{ $errors->first('phone') }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                            {{ $errors->first('email') }}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('message', 'Hi, I would like more information about:[Inventory #: ' . $entry->id . ']  ' . $entry->title, array('placeholder' => 'Message', 'class' => 'form-control')) }}
                            {{ $errors->first('message') }}
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
            </div>
            <div class="newsletter">
                    {{ Form::open(array('route' => 'front.newsletter')) }}
                        <h3>Subscribe to our newsletter</h3>
                        <div class="form-group">
                            {{ Form::text('name', null, array('placeholder' => 'Name (optional)', 'class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                            {{ $errors->first('email') }}
                        </div>
                        <div class="form-group">
                            {{ Form::button('Subscribe', array('class' => 'btn btn-default', 'type' => 'submit')) }}
                        </div>
                    {{ Form::close() }}
                    <p>{{ Session::get('message') }}</p>
            </div>
        </div>
    </div>
@stop
