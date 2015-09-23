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
                <th>{{ Lang::get('offer.name') }}</th>
                <th>{{ Lang::get('offer.storage') }}</th>
                <th>{{ Lang::get('offer.boat') }}</th>
                <th>{{ Lang::get('offer.storage_period') }}</th>
                <th>{{ Lang::get('offer.storage_start') }}</th>
                <th>{{ Lang::get('admin.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($offers as $offer)
                <tr>
                    <td>{{$offer->name}}</td>
                    <td>{{$offer->storage}}</td>
                    <td>{{$offer->boat}}</td>
                    <td>{{$offer->storage_period}}</td>
                    <td>{{$offer->storage_start}}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{ URL::route('admin.offer.view', array('id' => $offer->id)) }}">{{ Lang::get('admin.action_view') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop