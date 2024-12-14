<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    {!! Theme::style('css/main.css') !!}

    @stack('css-stack')

    <title>@section('title')@setting('core::site-name')@show</title>

</head>