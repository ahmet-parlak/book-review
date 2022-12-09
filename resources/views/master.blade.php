<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'BookReview')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('/')}}favicon.png">
    
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/') }}assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/') }}assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    {{-- CSS --}}
    @yield('css')
</head>

<body>
@include('template.header')

    <div class="main">
        @yield('main')
    </div>

@include('template.footer')