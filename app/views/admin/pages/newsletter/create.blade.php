@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('newsletter.headtitle') }}
@stop

@section('title')
    {{ Lang::get('newsletter.add') }}
@stop

@section('content')
    <div class="col-xs-12">
    {{ Form::open(array('route' => array('admin.newsletter.create', $catalog->id))) }}
        <h3>Voor {{ $catalog->title }}</h3>
        {{ Form::hidden('images', null, array('id' => 'images')) }}
        <div class="imgselect">
            <h4>Selecteer de afbeeldingen die meegestuurd dienen te worden door op de afbeelding te klikken.</h4>
        @foreach($catalog->pictures as $picture)
            <div class="col-xs-4">
                <img onclick="addToImages(this);" src="{{ URL::asset('custom/owner_images/') }}/{{ $catalog->id }}/250-{{ $picture->url }}" class="img-responsive" alt="{{$catalog->title}}" />
            </div>
        @endforeach
        </div>
        <div class="form-group">
            {{ Form::button(Lang::get('admin.action_send'), array('class' => 'btn btn-primary', 'type' => 'submit')) }}
            <a href="{{ URL::route('admin.newsletter.index') }}">{{ Lang::get('admin.action_cancel') }}</a>
        </div>
    {{ Form::close() }}
    </div>
    <script type="text/javascript">
        var addToImages = function(image) {
            var hiddenInput = document.getElementById('images');
            var currentValue = hiddenInput.value;
            if (currentValue.search(image.src) == -1) {
                if (currentValue.length > 0) {
                    hiddenInput.value = hiddenInput.value + '|' + image.src;
                } else {
                    hiddenInput.value = image.src;
                }
                image.className = 'selected'
            }
        }
    </script>
    <style>
        .imgselect .selected {
            border: 4px solid #333;
        }
    </style>
@stop