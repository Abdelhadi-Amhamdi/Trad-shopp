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
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

    <script>

        $(document).ready(function () {

                $(".slider").owlCarousel({
                    loop:false,
                    autoplay:true,
                    autoplayTimeout:3500,
                    smartSpeed:2500,
                    responsive:{
                        0:{
                            items :1
                        },
                        600:{
                            items :1.4
                        },
                        1000:{
                            items :3
                        },
                    },
                });
          });
    </script>




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
</head>
<body>
    <div id="app" class="main">

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
     var home = new Vue({
        el: '#show',
        data: {
            message: 'hello',
            dataCards: [],
            dataSaves: [],
        },
        methods: {
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
            this.getCards();
            this.getSaves();
        }

     })
</script>





</body>
</html>
