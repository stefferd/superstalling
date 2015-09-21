@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('pages.headtitle') }}
@stop

@section('title')
    {{ Lang::get('pages.edit') }}
@stop

@section('content')
    {{ Form::model($page, array('route' => array('admin.pages.update', $page->id))) }}
    <div class="col-xs-12">
        <div class="form-group">
            <a class="open">Edit meta data</a>
        </div>
        <div class="form-group">
            {{ Form::label('title', Lang::get('pages.title'), array('class' => 'control-label')) }}
            {{ Form::text('title', null, array('placeholder' => 'Pagina titel', 'class' => 'form-control')) }}
            {{ $errors->first('title') }}
        </div>
        <div class="form-group">
            {{ Form::label('content', Lang::get('pages.content'), array('class' => 'control-label')) }}
            {{ Form::textarea('content', null, array('placeholder' => 'Inhoud van de pagina', 'class' => 'form-control', 'id' => 'ckeditor')) }}
            {{ $errors->first('content') }}
        </div>
    </div>
    <div class="panel-right">
        <h2><span class="close">X</span> Meta data</h2>
        <hr />
        <div class="form-group">
            {{ Form::label('type', Lang::get('pages.type'), array('class' => 'control-label')) }}
            {{ Form::select('type', array('1' => 'Pagina', '2' => 'Contact', '3' => 'Catalogus')) }}
            {{ $errors->first('content') }}
        </div>
        <div class="form-group">
            {{ Form::label('active', Lang::get('pages.active'), array('class' => 'control-label')) }}
            {{ Form::checkbox('active') }}
        </div>
        <div class="form-group">
            {{ Form::label('keywords', Lang::get('pages.keywords'), array('class' => 'control-label')) }}
            {{ Form::text('keywords', null, array('placeholder' => 'Trefwoorden...', 'class' => 'form-control')) }}
            {{ $errors->first('keywords') }}
        </div>
        <div class="form-group">
            {{ Form::label('description', Lang::get('pages.description'), array('class' => 'control-label')) }}
            {{ Form::text('description', null, array('placeholder' => 'Korte pagina omschrijving...', 'class' => 'form-control')) }}
            {{ $errors->first('description') }}
        </div>
        <div class="form-group">
            {{ Form::button(Lang::get('admin.action_save'), array('class' => 'btn btn-primary', 'type' => 'submit')) }}
            <a href="{{ URL::route('admin.pages.index') }}">{{ Lang::get('admin.action_cancel') }}</a>
        </div>
    </div>
    {{ Form::close() }}
    <script type="text/javascript" src="{{ URL::asset('assets/js/ckeditor/ckeditor.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('ckeditor');

        $('.open').click(function(event) {
            var $rightPanel = $(this);
            $rightPanel.addClass('show');
        });

        $('.close').click(function(event) {
            var $rightPanel = $(this);
            $rightPanel.removeClass('show');
        });
    </script>
@stop