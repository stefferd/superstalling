@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('subscriber.headtitle') }}
@stop

@section('title')
    {{ Lang::get('subscriber.index') }}
@stop

@section('content')
    @if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ Lang::get('subscriber.name') }}</th>
                <th>{{ Lang::get('subscriber.email') }}</th>
                <th>{{ Lang::get('subscriber.created_at') }}</th>
                <th>{{ Lang::get('subscriber.updated_at') }}</th>
                <th>{{ Lang::get('admin.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscribers as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ URL::route('admin.subscriber.delete', array('id' => $item->id)) }}">{{ Lang::get('admin.action_delete') }}</a>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <br />
    <div class="col-xs-12">
        {{ Form::open(array('route' => 'admin.subscriber.create')) }}
            <div class="form-group">
                {{ Form::label('name', Lang::get('subscriber.name'), array('class' => 'control-label')) }}
                {{ Form::text('name', Input::old('name') , array('placeholder' => 'Naam', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', Lang::get('subscriber.email'), array('class' => 'control-label')) }}
                {{ Form::text('email', Input::old('email'), array('placeholder' => 'naam@domein.nl', 'class' => 'form-control')) }}
                {{ $errors->first('email') }}
            </div>
            <div class="form-group">
                {{ Form::button(Lang::get('admin.action_save'), array('class' => 'btn btn-primary', 'type' => 'submit')) }}
                <a href="{{ URL::route('admin.pages.index') }}">{{ Lang::get('admin.action_cancel') }}</a>
            </div>
        {{ Form::close() }}
    </div>
@stop