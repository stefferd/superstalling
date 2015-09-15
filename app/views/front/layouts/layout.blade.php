<!doctype html>
<html lang="nl">
<head>
    @include('front.includes.head')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/sass-bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}" />
</head>
<body class="{{$page->title}}">
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <a class="navbar-brand" href="#">logo</a>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li {{($page->title == 'Home') ? ' class="active"' : ''}}><a href="{{ URL::to('/') }}" title="Home">Home</a></li>
                    <li class="dropdown">
                        <a href="{{ URL::to('/onze-diensten/') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Onze diensten <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('/stalling-en-tarieven/') }}">Stalling & tarieven</a></li>
                            <li><a href="{{ URL::to('/verhuur-klusloods/') }}">Verhuur klusloods</a></li>
                            <li><a href="{{ URL::to('/thuisbrengservice/') }}">Thuisbrengservice</a></li>
                            <li><a href="{{ URL::to('/overige/') }}">overige</a></li>
                        </ul>
                    </li>
                    <li {{($page->title == 'Offerte aanvragen') ? ' class="active"' : ''}}><a href="{{ URL::to('/offerte-aanvragen/') }}">Offerte aanvragen</a></li>
                    <li {{($page->title == 'Contact') ? ' class="active"' : ''}}><a href="{{ URL::to('/contact/') }}" title="Contact">Contact</a></li>
                    <li {{($page->title == 'Scheepvaartwinkel Marine BV') ? ' class="active"' : ''}}><a href="{{ URL::to('/scheepvaartwinkel-marine-bv/') }}">Scheepvaartwinkel Marine B.V</a></li>
                </ul>
            </div><!--/.navbar-collapse -->
        </div>
    </div>
    @if ($page->title == 'Home')
        <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{ URL::asset('assets/img/1@2x.jpg') }}" height="540">
                </div>
                <div class="item">
                    <img src="{{ URL::asset('assets/img/2@2x.jpg') }}" height="540">
                </div>
                <div class="item">
                    <img src="{{ URL::asset('assets/img/3@2x.jpg') }}" height="540">
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        <div class="container">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-md-4">
                    <div class="storage-indcator">
                        <span class="label indicator label-success">Vrij</span>
                        <h2>Buiten stalling</h2>
                        <span class="label label-primary">&euro; 17,50 per m2</span>
                        <img src="{{ URL::asset('assets/img/stalling-1.gif') }}">
                    </div>

                    <p>Wij hebben 20.000 m2 buitenstalling beschikbaar. Deze stalling is volledig verhard en ligt bijzonder beschut. Alle stallingsplaatsen beschikken over een 220V aansluiting.</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p><a class="btn btn-primary" href="#" role="button">Direct reserveren</a></p>
                </div><!-- /.col-md-4 -->

                <div class="col-md-4">
                    <div class="storage-indcator">
                        <span class="label indicator label-success">Vrij</span>
                        <h2>Binnen stalling</h2>
                        <span class="label label-primary">&euro; 39,50 per m2</span>
                        <img src="{{ URL::asset('assets/img/stalling-2.gif') }}">
                    </div>
                    <p>Wij hebben 10.000 m2 beveiligde binnenstalling beschikbaar. De deuren van deze binnenstalling zijn 10 meter hoog, zodat nagenoeg alle schepen naar binnen kunnen zonder dat hier iets hoeft te worden afgebouwd. Alle stallingsplaatsen beschikken over een 220V aansluiting.</p>
                    <p><a class="btn btn-primary" href="#" role="button">Direct reserveren</a></p>
                </div><!-- /.col-md-4 -->

                <div class="col-md-4">
                    <div class="storage-indcator">
                        <span class="label indicator label-success">Vrij</span>
                        <h2>BINNEN STALLING VORSTVRIJ</h2>
                        <span class="label label-primary">&euro; 49,50 per m2</span>
                        <img src="{{ URL::asset('assets/img/stalling-3.gif') }}">
                    </div>
                    <p>Wij hebben 4.000 m2 volledige vorstvrij en beveiligde binnenstalling beschikbaar. De deuren van deze binnenstalling zijn 10 meter hoog, zodat nagenoeg alle schepen naar binnen kunnen zonder dat hier iets hoeft te worden afgebouwd. Alle stallingsplaatsen beschikken over een 220V aansluiting.</p>
                    <p><a class="btn btn-primary" href="#" role="button">Direct reserveren</a></p>
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div>
    @else
        <div id="myCarousel" class="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{ URL::asset('assets/img/2@2x.jpg') }}" height="300">
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-md-12">
                    <h1>@yield('title')</h1>
                    @yield('content')
                    @yield('contact-form')
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div>
    @endif
    @include('front.includes.footer')
</body>
</html>