<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.codevibrant.com/html/kavya/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Nov 2021 14:50:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <!-- Favicon -->
  
  @isset($setting->image)
    <link rel="icon" type="image/png" sizes="48x48" href="{{asset('logo/'.$setting->image)}}">
  @else
    <link rel="icon" type="image/png" sizes="48x48" href="{{asset('logo/logo.png')}}"
  @endisset

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600&amp;display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}" />

  <!-- Fontawesome CSS-->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/all.css')}}" />

  <!-- slick css -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/css/slick-theme.css')}}">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/preloader.css')}}" />
  <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}" />
  <link rel="stylesheet" href="{{asset('frontend/assets/css/dark.css')}}" />


  

  <title>@yield('title')</title>
</head>
<body>