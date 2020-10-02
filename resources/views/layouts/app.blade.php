<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/app.js')}}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href=" {{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
</head>
<body>
    <div id="app">
        <div class="row">
            <div class="col-md-12">
                @include('partiels.navbar')
            </div>
        </div>

        @include('partiels.slider')

        @include('partiels.services')

        @include('partiels.products')

        <main class="py-4">
            @yield('content')
        </main>

        @include('partiels.footer')
    </div>

    <script src="/js/vue.js"></script>
    <script src="/js/axios/dist/axios.min.js"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken ' => csrf_token(),
            'url' => url('/')

        ])!!};
    </script>
    <script>
     var app = new Vue({
         el: '#app',
         data: {
             message : 'its working',
             data: [],
             currentProd: '',
             alert1: false ,
             alert2: false ,
             dataCards:[],
             dataSaves:[],
             show:{},
         },
         methods: {
            getProducts: function() {
                axios.get(window.Laravel.url+'/pro')
                .then(response => {
                    console.log(response);
                    this.data = response.data;
                })
            },
            save: function(prod) {
                api = window.Laravel.url+'/save/'+prod.id ;
                axios.post(api , prod)
                .then(response => {
                    console.log(response);
                    if(response.data.etat) {
                        this.alert1 = true ;
                        this.getSaves();
                    }

                })
            },
            addToCart: function(prod) {
                api = window.Laravel.url+'/add/cart/'+prod.id ;
                axios.post(api , prod)
                .then(response => {
                    console.log(response)
                    if(response.data.etat) {
                        this.alert2 = true ;
                        this.getCards();
                    }
                })
            },
            getCards() {
                axios.get(window.Laravel.url+'/get/cards')
                .then(response => {
                    console.log(response)
                    this.dataCards = response.data
                })
            },
            getSaves() {
                axios.get(window.Laravel.url+'/get/save')
                .then(response => {
                    console.log(response);
                    this.dataSaves = response.data;
                })
            },
         },created: function() {
             this.getProducts();
             this.getCards() ;
             this.getSaves();
         }
     })
    </script>
</body>
</html>
