@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('offer.headtitle') }}
@stop

@section('title')
    {{ Lang::get('offer.view') }}
@stop

@section('content')
    <a href="{{ URL::route('admin.offer.index') }}" title="Terug naar overzicht">Terug naar overzicht</a>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label class="form-label">Naam</label><br />
                {{ $offer->name }}
            </div>
            <div class="form-group">
                <label class="form-label">Adres</label><br />
                {{ $offer->street }}
            </div>
            <div class="form-group">
                <label class="form-label">Postcode + woonplaats</label><br />
                {{ $offer->zipcode }} {{ $offer->city }}
            </div>
            <div class="form-group">
                <label class="form-label">Telefoon</label><br />
                {{ $offer->phone }}
            </div>
            <div class="form-group">
                <label class="form-label">Email</label><br />
                {{ $offer->email }}
            </div>
            <div class="form-group">
                <label class="form-label">Soort stalling</label><br />
                {{ $offer->storage }}
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <label class="form-label">Naam van de boot</label><br />
                {{ $offer->boat }}
            </div>
            <div class="form-group">
                <label class="form-label">Afmeting van de boot</label><br />
                {{ $offer->boat_length }} meter bij {{ $offer->boat_width }} meter
            </div>
            <div class="form-group">
                <label class="form-label">Overige opties</label>
                <div class="checkbox disabled">
                    <label>
                        <input type="checkbox" disabled="disabled" {{ ($offer->repair_silo == 1) ? 'checked="true"': '' }} />
                        <strong>Huur reparatieloods</strong>
                    </label>
                </div>
                <div class="checkbox disabled">
                    <label>
                        <input type="checkbox" disabled="disabled" {{ ($offer->home_service == 1) ? 'checked="true"': '' }} />
                        <strong>Thuisbrengservice</strong>
                    </label>
                </div>
                <div class="home_service">
                    <div class="form-group">
                        <label class="form-label">Thuisbrengservice km</label>
                        {{ $offer->home_service_km }}
                    </div>
                </div>
                <div class="checkbox disabled">
                    <label>
                        <input type="checkbox" disabled="disabled" {{ ($offer->winter_ready == 1) ? 'checked="true"': '' }} />
                        <strong>Winterklaarmaken</strong>
                    </label>
                </div>
                <div class="checkbox disabled">
                    <label>
                        <input type="checkbox" disabled="disabled" {{ ($offer->battery_service == 1) ? 'checked="true"': '' }} />
                        <strong>Accuservice</strong>
                    </label>
                </div>
                <div class="checkbox disabled">
                    <label>
                        <input type="checkbox" disabled="disabled" {{ ($offer->outside_motor == 1) ? 'checked="true"': '' }} />
                        <strong>Opslag buitenboordmotor</strong>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">Stallingstart / dagdeel</label><br />
            {{ $offer->storage_start }} / {{ $offer->storage_period }}
    </div>
    <hr/>
    <div class="form-group">
        {{ $offer->remarks }}
    </div>
    <hr />
    <div class="form-group">
        <div class="row">
            <div class="col-xs-3">Subtotaal</div>
            <div class="col-xs-1">&euro;</div>
            <div class="col-xs-3" id="subtotal">{{ number_format($offer->total - ($offer->total / 100 * 21), 2) }}</div>
        </div>
        <div class="row">
            <div class="col-xs-3">21% BTW</div>
            <div class="col-xs-1">&euro;</div>
            <div class="col-xs-3" id="btw">{{ number_format($offer->total / 100 * 21, 2) }}</div>
        </div>
        <div class="row">
            <div class="col-xs-3"><strong>Totaal</strong></div>
            <div class="col-xs-1"><strong>&euro;</strong></div>
            <div class="col-xs-3" id="total">{{ $offer->total }}</div>
        </div>
    </div>
@stop