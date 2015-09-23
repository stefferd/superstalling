<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('meta') | {{ Config::get('statics.customer') }}</title>
<meta name="description" content="{{ Config::get('statics.customer') }} | @yield('description')" />
<meta name="robots" content="index, follow" />
<link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="/public/apple-touch-icon-precomposed.png">
<meta property="og:title"  content="@yield('meta') | {{ Config::get('statics.customer') }} | The place to buy classic cars" />
<meta property="og:image"  content="http://www.superstalling.nl/assets/img/1@2x.jpg" />
<meta property="og:description"  content="{{ Config::get('statics.customer') }} | @yield('description')" />
<meta property="og:site_name" content="{{ Config::get('statics.customer_url') }}" />
<meta property="og:url" content="http://www.superstalling.nl/{{ str_replace(' ', '-', strtolower($page->title)) }}" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://codeorigin.jquery.com/jquery-1.10.2.min.js"></script>