<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="/css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
@yield('style')
</head>
<body>
    <div id="header-wrapper">
        <div id="header" class="container">
            <div id="logo">
                <h1><a href="/">SimpleWork</a></h1>
            </div>
            <div id="menu">
                
                    @if (Route::has('login'))
                        @auth
                        <ul>
                            <li class=" {{Request::path() === '/' ? 'current_page_item' : ''}} "><a href="/" accesskey="1" title="">Homepage</a></li>
                            <li class=" {{Request::path() === 'articles' ? 'current_page_item' : ''}} "><a href="/articles" accesskey="4" title="">Articles</a></li>
                            <li class=" {{Request::path() === 'create' ? 'current_page_item' : ''}} "><a href="/create" accesskey="5" title="">Create an article</a></li>
                            <li class=" {{Request::path() === 'bot' ? 'current_page_item' : ''}} "><a href="/bot" accesskey="5" title="">Bot Settings</a></li>
                            <li class=" {{Request::path() === 'dashboard' ? 'current_page_item' : ''}} "><a href="{{ url('/dashboard') }}" >Dashboard</a></li>
                        </ul>
                        @else
                            <a href="{{ route('login') }}" style="color:white; padding:0px 16px; text-decoration:none; font-size:17px">Login</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" style="color:white; padding:0px 16px; text-decoration:none; font-size:17px">Register</a>
                            @endif
                        @endif
                @endif
               
            </div>
        </div>
        @yield('header')
    </div>
    @yield('content')
    <div id="copyright" class="container">
        <p>&copy; Untitled. All rights reserved. | Photos by <a href="https://unsplash.com/">unsplash</a> | Design by <a href="#" rel="nofollow">Somebody</a>.</p>
    </div>
</body>
</html>
