@extends('front.layouts.layout')

@section('meta'){{ $page->title }}@stop

@section('keywords'){{ $page->keywords }}@stop

@section('description'){{ $page->description }}@stop

@section('title'){{ $page->title }}@stop

@section('content')
    <ol class="breadcrumb">
        <li><a href="/" title="Superstalling">Home</a></li>
        <li class="active">{{ $page->title }}</li>
    </ol>
    {{ $page->content }}
    @if (!isset($message))
        {{ Form::open(array('route' => array('front.sendOffer'))) }}
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('name', 'Naam', array('class' => 'form-label')) }}
                    {{ Form::text('name', null, array('placeholder' => 'Naam', 'class' => 'form-control')) }}
                    {{ $errors->first('name') }}
                </div>
                <div class="form-group">
                    {{ Form::label('address', 'Adres', array('class' => 'form-label')) }}
                    {{ Form::text('address', null, array('placeholder' => 'Adres', 'class' => 'form-control')) }}
                    {{ $errors->first('address') }}
                </div>
                <div class="form-group">
                    {{ Form::label('zipcode', 'Postcode + woonplaats', array('class' => 'form-label')) }}
                    <div class="row">
                        <div class="col-xs-3">
                            {{ Form::text('zipcode', null, array('placeholder' => 'Postcode', 'class' => 'form-control')) }}
                            {{ $errors->first('zipcode') }}
                        </div>
                        <div class="col-xs-3 col-xs-offset-6">
                            {{ Form::text('city', null, array('placeholder' => 'Plaats', 'class' => 'form-control')) }}
                            {{ $errors->first('city') }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('phone', 'Telefoon', array('class' => 'form-label')) }}
                    {{ Form::text('phone', null, array('placeholder' => 'Telefoon', 'class' => 'form-control')) }}
                    {{ $errors->first('phone') }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email', array('class' => 'form-label')) }}
                    {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                    {{ $errors->first('email') }}
                </div>
                <div class="form-group">
                    {{ Form::label('storage', 'Soort stalling', array('class' => 'form-label')) }}
                    <div class="radio">
                        <label>
                            {{ Form::radio('storage', 'Binnenstalling vorstvrij') }}
                            <strong>Binnenstalling vorstvrij</strong><br/>
                            &euro; 49,50 per winter stalling seizoen*, per m<sup>2</sup>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            {{ Form::radio('storage', 'Binnenstalling') }}
                            <strong>Binnenstalling</strong><br/>
                            &euro; 39,50 per winter stalling seizoen*, per m<sup>2</sup>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            {{ Form::radio('storage', 'Buitenstalling') }}
                            <strong>Buitenstalling</strong><br/>
                            &euro; 17,50 per winter stalling seizoen*, per m<sup>2</sup>
                        </label>
                    </div>
                    {{ $errors->first('storage') }}
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('boat', 'Naam van de boot', array('class' => 'form-label')) }}
                    {{ Form::text('boat', null, array('placeholder' => 'Naam van de boot', 'class' => 'form-control')) }}
                    {{ $errors->first('boat') }}
                </div>
                <div class="form-group">
                    {{ Form::label('boat_length', 'Afmetingen van de boot', array('class' => 'form-label')) }}
                    <div class="row">
                        <div class="col-xs-3">
                            {{ Form::text('boat_length', null, array('placeholder' => 'Lengte', 'class' => 'form-control length')) }}
                            (meter)
                            {{ $errors->first('boat_length') }}
                        </div>
                        <div class="col-xs-3 col-xs-offset-6">
                            {{ Form::text('boat_width', null, array('placeholder' => 'Breedte', 'class' => 'form-control width')) }}
                            (meter)
                            {{ $errors->first('boat_width') }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('repair_silo', 'Overige opties', array('class' => 'form-label')) }}
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('repair_silo', 1) }}
                            <strong>Huur reparatieloods</strong><br/>
                            Op basis van offerte duur / werkzaamheden
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('home_service', 1) }}
                            <strong>Thuisbrengservice</strong><br/>
                            &euro; 0,50 cent per km<br/>
                            <i>(1e 50 km gratis bij vorstvrije binnen stalling)</i>
                        </label>
                    </div>
                    <div class="hidden home_service">
                        <div class="form-group">
                            {{ Form::label('home_service_km', 'Aantal km', array('class' => 'form-label')) }}
                            {{ Form::text('home_service_km', null, array('placeholder' => 'Aantal km', 'class' => 'form-control')) }}
                            {{ $errors->first('home_service_km') }}
                        </div>
                    </div>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('winter_ready', 1) }}
                            <strong>Winterklaarmaken</strong><br/>Op basis van offerte
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('battery_service', 1) }}
                            <strong>Accuservice</strong><br/>Gratis<br/><i>Exclusief levering nieuwe accu</i>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('outside_motor', 1) }}
                            <strong>Opslag buitenboordmotor</strong><br/>Gratis
                        </label>
                    </div>
                    {{ $errors->first('storage') }}
                </div>
            </div>
        </div>
        <hr/>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-3">Subtotaal</div>
                <div class="col-xs-1">&euro;</div>
                <div class="col-xs-3" id="subtotal"></div>
            </div>
            <div class="row">
                <div class="col-xs-3">21% BTW</div>
                <div class="col-xs-1">&euro;</div>
                <div class="col-xs-3" id="btw"></div>
            </div>
            <div class="row">
                <div class="col-xs-3"><strong>Totaal</strong></div>
                <div class="col-xs-1"><strong>&euro;</strong></div>
                <div class="col-xs-3" id="total"></div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::textarea('remarks', null, array('placeholder' => 'Opmerkingen', 'class' => 'form-control')) }}
            {{ $errors->first('remarks') }}
        </div>
        <div class="form-group">
            {{ Form::button('Send', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
            <small class="text-muted">All fields are required</small>
        </div>
        {{ Form::close() }}
        <script type="text/javascript">
            $('document').ready(function () {
                $('#subtotal').html('0,00');
                $('#btw').html('0,00');
                $('#total').html('<strong>0,00</strong>');

                $('.length').on('change', function() {
                    calculatePrice();
                });
                $('.width').on('change', function() {
                    calculatePrice();
                });
                $('#storage').on('change', function() {
                    calculatePrice();
                });

                $('#home_service').on('change', function() {
                   var $this = $(this);
                    if ($this.val() === 1) {
                        $('.home_service_km').removeClass('hidden');
                    } else {
                        $('.home_service_km').addClass('hidden');
                    }
                });

                $('#home_service_km').on('change', function() {
                    calculatePrice();
                });

                var calculatePrice = function () {
                    var $length = $('.length');
                    var $width = $('.width');
                    var $storage = $('#storage');

                    if ($length.val() !== '' && $width.val() !== '' && $storage.val() !== '') {
                        var size = parseFloat($length.val().replace(',', '.')) * parseFloat($width.val().replace(',', '.'));
                        var price = 49.50;
                        if ($storage.val() === 'Binnenstalling') {
                            price = 39.50;
                        } else if ($storage.val() === 'Buitenstalling') {
                            price = 17.50;
                        }

                        var subtotal = price * size;
                        if ($('#home_service_km').val() !== '') {
                            var homeServiceKm = $('#home_service_km').val();
                            var freeKm = 0;
                            if (price === 49.50) {
                                freeKm = 50;
                            }
                            homeServiceKm = parseFloat(homeServiceKm.replace(',', '.'));
                            homeServiceKm = homeServiceKm - freeKm;

                            if (homeServiceKm > 0) {
                                subtotal = subtotal + (homeServiceKm * 0.50);
                            }
                        }

                        var btw = subtotal / 100 * 21;
                        var total = subtotal + btw;
                        subtotal = Math.round(subtotal * 100) / 100;

                        $('#subtotal').html(subtotal.toFixed(2));
                        $('#btw').html(btw.toFixed(2));
                        $('#total').html('<strong>' + total.toFixed(2) + '</strong>');
                    }
                };
            });
        </script>
    @else
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@stop