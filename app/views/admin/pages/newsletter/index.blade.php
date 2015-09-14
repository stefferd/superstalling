@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('newsletter.headtitle') }}
@stop

@section('title')
    {{ Lang::get('newsletter.index') }}
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
                <th>{{ Lang::get('newsletter.title') }}</th>
                <th>{{ Lang::get('newsletter.active') }}</th>
                <th>{{ Lang::get('newsletter.created_at') }}</th>
                <th>{{ Lang::get('newsletter.updated_at') }}</th>
                <th>{{ Lang::get('admin.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($newsletter as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>
                        @if ($item->active == 1)
                            {{ Lang::get('newsletter.active_true') }}
                        @else
                            {{ Lang::get('newsletter.active_false') }}
                        @endif</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ URL::route('admin.newsletter.delete', array('id' => $item->id)) }}">{{ Lang::get('admin.action_delete') }}</a>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@stop