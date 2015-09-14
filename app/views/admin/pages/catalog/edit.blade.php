@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('catalog.headtitle') }}
@stop

@section('title')
    {{ Lang::get('catalog.edit') }}
@stop

@section('content')
    {{ Form::model($item, array('route' => array('admin.catalog.update', $item->id), 'files' => true)) }}
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                {{ Form::label('title', Lang::get('catalog.title'), array('class' => 'control-label')) }}
                {{ Form::text('title', null , array('placeholder' => 'Pagina titel', 'class' => 'form-control')) }}
                {{ $errors->first('title') }}
            </div>
            <div class="form-group">
                {{ Form::label('description', Lang::get('catalog.content'), array('class' => 'control-label')) }}
                {{ Form::textarea('description', null, array('placeholder' => 'Inhoud van de pagina', 'class' => 'form-control')) }}
                {{ $errors->first('description') }}
            </div>
            <h2>Pictures</h2>
            <div class="form-group">
                {{ Form::label('pictures', Lang::get('catalog.picture'), array('class' => 'control-label')) }}
                {{ Form::file('pictures[]', array('multiple' => true)) }}
                {{ $errors->first('picture') }}
            </div>
            {{ Form::hidden('main_pic', $item->car->main_pic, array('id' => 'main_pic')) }}
            <div class="pictures">
                @foreach($item->pictures as $picture)
                    <div class="picture" style="display: inline-block; vertical-align: top; padding-bottom: 20px;">
                        <img onclick="setMainImage(this, {{$picture->id}});" src="{{ URL::to('/') . '/custom/owner_images/' . $item->id . '/250-' . $picture->url }}" width="250" alt="{{$item->title}}" />
                        <a style="clear: both; display: block; margin: -50px auto 0 auto; width: 100px; z-index: 1; position: relative;" class="btn btn-default" href="{{ URL::route('admin.catalog.deletePicture', array('id' => $picture->id)) }}">Delete</a>
                    </div>
                @endforeach
            </div>
            <script type="text/javascript">
                var setMainImage = function(element, value) {
                    var mainPicInput = document.getElementById('main_pic');
                    mainPicInput.value = value;
                    element.className = 'selected';
                }
            </script>
            <style>
                .pictures img {
                    border: 3px solid #FFF;
                }

                .pictures img.selected {
                    border: 3px solid #333;
                }
            </style>
            <div class="form-group">
                {{ Form::button(Lang::get('admin.action_save'), array('class' => 'btn btn-primary', 'type' => 'submit')) }}
                <a href="{{ URL::route('admin.catalog.index') }}">{{ Lang::get('admin.action_cancel') }}</a>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <h3>Details</h3>
            <div class="form-group">
                {{ Form::text('brand', $item->car->brand , array('placeholder' => 'Brand', 'class' => 'form-control')) }}
                {{ $errors->first('brand') }}
            </div>
            <div class="form-group">
                {{ Form::text('type', $item->car->type , array('placeholder' => 'Type', 'class' => 'form-control')) }}
                {{ $errors->first('type') }}
            </div>
            <div class="form-group">
                {{ Form::text('price', $item->car->price , array('placeholder' => 'Price', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::text('engine', $item->car->engine , array('placeholder' => 'Engine', 'class' => 'form-control')) }}
                {{ $errors->first('engine') }}
            </div>
            <div class="form-group">
                {{ Form::select('transmission', array('Manual transmission' => 'Manual transmission', 'Automatic transmission' => 'Automatic transmission'), $item->car->transmission, array('placeholder' => 'Transmission', 'class' => 'form-control'))}}
                {{ $errors->first('make') }}
            </div>
            <div class="form-group">
                {{ Form::text('make', $item->car->make , array('placeholder' => 'Make', 'class' => 'form-control')) }}
                {{ $errors->first('make') }}
            </div>
            <div class="form-group">
                {{ Form::text('milage', $item->car->milage , array('placeholder' => 'Milage', 'class' => 'form-control')) }}
                {{ $errors->first('milage') }}
            </div>
            <div class="form-group">
                {{ Form::select('status',
                    array(
                        'Available' => 'Available',
                        'Coming soon' => 'Coming soon',
                        'Reserved' => 'Reserved',
                        'Sold' => 'Sold'
                    ), $item->car->status, array('placeholder' => 'Status', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{ Form::text('location', $item->car->location , array('placeholder' => 'Location', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::text('youtube', $item->car->youtube , array('placeholder' => 'Youtube url', 'class' => 'form-control')) }}
            </div>
        </div>
    {{ Form::close() }}
@stop