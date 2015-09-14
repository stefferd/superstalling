<meta charset="utf-8">
<meta name="description" content="plainCMS">
<meta name="robots" content="index, no-follow" />
<title>@yield('meta') - plainCMS</title>
<!-- load bootstrap from a cdn -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" />
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public/assets/build/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#content, textarea#description',
        content_css : '{{ URL::asset('assets/build/css/style.css') }}',
        toolbar: 'bold italic | link image | alignleft aligncenter alignright | undo redo | styleselect | code',
        menubar: false,
        plugins : 'advlist autolink link image lists charmap print preview code'
     });
</script>

