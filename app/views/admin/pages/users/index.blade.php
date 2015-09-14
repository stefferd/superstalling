@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('users.headtitle') }}
@stop

@section('title')
    {{ Lang::get('users.index') }}
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
                <th>{{ Lang::get('users.name') }}</th>
                <th>{{ Lang::get('users.email') }}</th>
                <th>{{ Lang::get('users.created_at') }}</th>
                <th>{{ Lang::get('admin.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        @if (Auth::user()->level >= $user->level)
                            <div class="btn-group">
                                <a class="btn btn-xs btn-default" href="{{ URL::route('admin.users.edit', array('id' => $user->id)) }}">{{ Lang::get('admin.action_edit') }}</a>
                                @if (Auth::user()->level >= 2)
                                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ URL::route('admin.users.delete', array('id' => $user->id)) }}">{{ Lang::get('admin.action_delete') }}</a></li>
                                    </ul>
                                @endif
                            </div>
                        @else
                            &nbsp;
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ URL::route('admin.users.new') }}">{{ Lang::get('admin.action_add') }}</a>
@stop