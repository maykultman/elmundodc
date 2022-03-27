<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link  rel="icon" type="image/png" href="{{ asset('images/logo-mchiquitin.png')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600&display=swap" rel="stylesheet">
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">

   
    <link rel="stylesheet" href="{{ asset('js/Toast/toast.css') }}"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
</head>
<body>
    <div id="app" class="container-fluid">
        <main class="row">
            @include('static.nav')
            <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 d-flex justify-content-center vh-100"  style="overflow:auto;">
                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11">
                    @include('static.nav-top')
                    <div class="mt-3" style="position: relative;">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="loader" class="load">
      <svg width="70px" height="70px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-dual-ring">
        <circle cx="50" cy="50" fill="none" stroke-linecap="round" r="40" stroke-width="4" stroke="#f3f3f3" stroke-dasharray="62.83185307179586 62.83185307179586" transform="rotate(312 50 50)">
          <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite">
          </animateTransform>
        </circle>
      </svg>
    </div>
    <script>
      var site = {
        current : '<?=request()->route()->getName()?>',
        api : '<?=Config::get('app.url')?>:4003/api',
        url : '<?=Config::get('app.url')?>:4003'
      }
    </script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/Toast/toast.js') }}"></script>
    @if( request()->route()->getName() == 'caja.index' )
      <script src="{{ asset('js/autocomplete.js') }}"></script>
    @endif
    
</body>
</html>
