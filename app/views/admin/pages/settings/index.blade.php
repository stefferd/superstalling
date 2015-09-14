@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('settings.headtitle') }}
@stop

@section('title')
    {{ Lang::get('settings.index') }}
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
                <th>{{ Lang::get('settings.key') }}</th>
                <th>{{ Lang::get('settings.value') }}</th>
                <th>{{ Lang::get('settings.created_at') }}</th>
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
                        <a class="btn btn-xs btn-default" href="{{ URL::route('admin.settings.edit', array('id' => $setting->id)) }}">{{ Lang::get('admin.action_edit') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop