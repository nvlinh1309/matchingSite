<?php
use App\Category;
$categories = Category::where('status',1)->orderBy('position', 'ASC')->get();
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{URL::asset('images/logo_circle.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("/css/hl-style.css")}}">


    <!-- Bootstrap CSS-->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("adminert/css/font-awesome.min.css")}}">

    <!-- My main CSS -->
    <link href="{{asset("css/style.css")}}" rel="stylesheet" type="text/css" />

    <!-- JS Min -->
    <script type="text/javascript" src="{{asset("js/jquery-1.10.2.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/jquery-migrate-1.2.1.min.js")}}"></script>

    <!-- Bootstrap JS-->
    <script type="text/javascript" src="{{asset("js/bootstrap.min.js")}}"></script>

    <link rel="stylesheet" href="{{asset("owl.carousel/owl.carousel.css")}}" />
    <link rel="stylesheet" type="text/css" href="{{asset("owl.carousel/owl.theme.default.css")}}"/>
    <script src="{{asset("owl.carousel/owl.carousel.min.js")}}"></script>


    <!-- SmartMenus core CSS (required) -->
    <link href="{{asset("css/sm-core-css.css")}}" rel="stylesheet" type="text/css" />
    <!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
    <link href="{{asset("css/sm-blue.css")}}" rel="stylesheet" type="text/css" />
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="{{asset("js/jquery.smartmenus.js")}}"></script>
    <!-- SmartMenus jQuery init -->
    <script type="text/javascript">
        $(function() {
            $('#main-menu').smartmenus({
                subMenusSubOffsetX: 1,
                subMenusSubOffsetY: -8
            });

            $('#main-menus').smartmenus({
                subMenusSubOffsetX: 1,
                subMenusSubOffsetY: -8
            });
        });
    </script>

    <link href="{{asset("css/tablek.css")}}" rel="stylesheet" type="text/css" />
    <style>
        @media(min-width: 768px){
            #linkfoot ul li#menu-mobile{
                display: none;
            }
        }
        @media(max-width: 768px){
            #linkfoot ul li .caret{
                cursor: pointer;
            }
            #linkfoot ul li, #linkfoot{
                width: 100%;
                border-bottom: 1px solid #fff;
            }
            #linkfoot ul li:not(:first-child){
                display: none;
            }
            #foot-menu.active li{
                display: block !important;
            }
        }
    </style>



{{--    <link rel="stylesheet" href="{{ URL::asset('css/user/style.css') }}">--}}
{{--    --}}{{--    Mobile--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('css/user/style.mobile.css') }}">--}}
{{--    @yield('styles')--}}
</head>
<body>

{{--@include('scripts.ajax-route')--}}
@include('user.layouts.header')
<main id="main_content">
    @yield('content')
</main>
@include('user.layouts.footer')
{{--@include('commons.loading')--}}


@yield('scripts')
</body>

</html>
