<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="../../../favicon.png" />
    <link rel="shortcut icon" href="../../../favicon.png"/>


    <title>Marowhack - @yield('title')</title>


    <link rel="stylesheet" href="../../../css/all.css"/>

    <script type="text/javascript" src="../../../js/all.js"></script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="container-fluid">

    <header class="row">
        @include('include.header')
    </header>

    <main class="row">
        @yield('main')
    </main>

    <footer class="row">
        @include('include.footer')
    </footer>
</div>
</body>
</html>
