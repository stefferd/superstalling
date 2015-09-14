@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('pages.headtitle') }}
@stop

@section('title')
    {{ Lang::get('pages.index') }}
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
                <th>{{ Lang::get('pages.title') }}</th>
                <th>{{ Lang::get('pages.active') }}</th>
                <th>{{ Lang::get('pages.created_at') }}</th>
                <th>{{ Lang::get('pages.updated_at') }}</th>
                <th>{{ Lang::get('admin.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{$page->id}}</td>
                    <td>{{$page->title}}</td>
                    <td>
                        @if ($page->active == 1)
                            {{ Lang::get('pages.active_true') }}
                        @else
                            {{ Lang::get('pages.active_false') }}
                        @endif</td>
                    <td>{{$page->created_at}}</td>
                    <td>{{$page->updated_at}}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-xs btn-default" href="{{ URL::route('admin.pages.edit', array('id' => $page->id)) }}">{{ Lang::get('admin.action_edit') }}</a>
                            @if (Auth::user()->level >= 2)
                                <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ URL::route('admin.pages.delete', array('id' => $page->id)) }}">{{ Lang::get('admin.action_delete') }}</a></li>
                                </ul>
                            @endif
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ URL::route('admin.pages.new') }}">{{ Lang::get('admin.action_add') }}</a>
@stop