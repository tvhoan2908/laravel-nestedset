<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <main class="py-4">
        <div class="container">
            <div class="card">
                <div class="row">
                    <div class="card-body">
                        @foreach ($shops as $shop)
                            <div class="col-md-12">
                                <h3>{{ $shop->category_name }}</h3>
                                <hr />
                                <div class="row">
                                    @foreach ($shop->children as $cats)
                                        <div class="col-md-4">
                                            <h4>{{ $cats->category_name }}</h4>
                                            <hr>
                                            @foreach ($cats->children as $cat)
                                                <h5>{{ $cat->category_name }}</h5>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
</body>
</html>