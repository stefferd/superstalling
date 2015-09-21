@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('offer.headtitle') }}
@stop

@section('title')
    {{ Lang::get('offer.index') }}
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
                <th>{{ Lang::get('offer.key') }}</th>
                <th>{{ Lang::get('offer.value') }}</th>
                <th>{{ Lang::get('offer.created_at') }}</th>
                <th>{{ Lang::get('admin.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $setting)
                <tr>
                    <td>{{$setting->key}}</td>
                    <td>{{$setting->value}}</td>
                    <td>{{$setting->created_at}}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ URL::route('admin.offer.edit', array('id' => $setting->id)) }}">{{ Lang::get('admin.action_edit') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop