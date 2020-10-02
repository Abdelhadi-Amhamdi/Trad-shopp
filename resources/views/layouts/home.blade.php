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
    <link rel="stylesheet" href="{{ asset('/fonts/theGwathmey/TheGwathmey.ttf')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href=" {{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
</head>
<body>
            <div id="app">
                <div class="content" id="home">
                    <div class="row" id="nav">
                        @include('partiels.navbar')
                    </div>

                     @yield('content')
                </div>
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
        el: '#home',
        data: {
            message: 'hello',
            add : false,
            edit: false ,
            currentItem: '',
            image: '',
            name: '',
            description :'',
            price: '',
            data: [ ],
            // save
            dataSaves: [],
            // cards
            dataCards: [],
            //order
            dataorder : {
                Adresse:'',
                Name :'',
                Email:'',
                City:'',
                Phone:'',
            },
            done : false ,
            ordersData: {
                adresse:'',
                name :'',
                email:'',
                city:'',
                phone:'',
            }
            ,
            DataInfo : {
                adresse:'',
                name :'',
                email:'',
                city:'',
                phone:'',
            },

        },
        methods: {
            loadimage: function(e) {
                this.image = e.target.files[0];
                console.log(this.image);
            },
            newItem: function() {

                var formData = new FormData();

                // append image
                formData.append("image" , this.image);

                // append title
                var name = document.querySelector('#title');
                this.name = name.value;
                formData.append('title' , this.name );

                // append description
                var desc = document.querySelector('#description');
                this.description = desc.value;
                formData.append('description' , this.description);

                // append price

                var prix = document.querySelector('#price');
                this.price = prix.value;
                formData.append('price' , this.price);



                // post data with axios
                axios.post(window.Laravel.url+'/add/item' , formData , {
                    headers:{
                        'Content-Type' : 'multipart/form-data'
                    }
                })
                .then(response => {

                    this.getitems();
                    this.add = false ;

                })


            },
            getitems() {
                axios.get(window.Laravel.url+'/get/items')
                .then(response => {
                    console.log(response);
                    this.data = response.data;
                })
            },
            editItem() {
                // put via axios
                api = window.Laravel.url+ '/update/' + this.currentItem.id ;
                axios.put(api , this.currentItem )
                .then(response => {
                    console.log(response);
                    if(response.data.etat) {
                        this.edit = false ;
                    }
                })
            },
            DeleteItem(item) {
                api = window.Laravel.url+ "/delete/ "+ item.id;
                console.log(api)
                axios.delete(api )
                .then(response => {
                    console.log(response);
                    var position = this.data.indexOf(item);
                    this.data.splice(position , 1 );
                })
            },

            // saves

            getSaves() {
                axios.get(window.Laravel.url+'/get/save')
                .then(response => {
                    console.log(response);
                    this.dataSaves = response.data;
                })
            },
            deleteSave(item) {
                axios.delete(window.Laravel.url+'/delete/save/'+item.id)
                .then(response => {
                    console.log(response);
                    var position = this.dataSaves.indexOf(item);
                    this.dataSaves.splice(position , 1);
                })
            },
            getCards() {
                axios.get(window.Laravel.url+'/get/cards')
                .then(response => {
                    console.log(response)
                    this.dataCards = response.data
                    this.dataorder = this.DataInfo
                })
            },
            deleteCard(item) {
                axios.delete(window.Laravel.url+'/delete/card/'+item.id)
                .then(response => {
                    console.log(response)
                    var index = this.dataCards.indexOf(item);
                    this.dataCards.splice(index , 1);
                })
            },
            // orders
            addtoOrder(){
                api = window.Laravel.url+'/make/order';
                console.log(api)
                axios.post( api , this.dataorder  )
                .then(response => {
                    console.log(response)
                    if(response.data.etat){
                        this.done = true ;
                    //    this.deleteall();
                    }
                })
            },
            // deleteall(){
            //             api = window.Laravel.url+'/delete/all';
            //             console.log(api)
            //                 axios.delete(api)
            //                 .then(response => {
            //                     console.log(response)
            //                 })
            //             },
            getOrders() {
                axios.get(window.Laravel.url+'/get/orders')
                .then(response => {
                    console.log(response)
                    this.ordersData = response.data;
                })
            },
            deleteOrder(order){
                axios.delete(window.Laravel.url+'/delete/order/'+order.id)
                .then(response => {
                    console.log(response);
                    if(response.data.etat) {
                        position = this.ordersData.indexOf(order);
                        this.ordersData.splice(position , 1);
                    }
                })
            },
            loadInfo(){
                api = window.Laravel.url+'/send/info';
                axios.put(api , this.DataInfo )
                .then(res => {
                    console.log(res);
                    if(res.data.etat){
                    //
                    }
                })
            },
            getInfo(){
                axios.get(window.Laravel.url+'/get/info')
                .then(res => {
                    console.log(res);
                    this.DataInfo.name = res.data.name ;
                    this.DataInfo.email = res.data.email ;
                    this.DataInfo.phone = res.data.phone ;
                    this.DataInfo.adresse = res.data.adresse ;
                    this.DataInfo.city = res.data.city ;
                })
            },



        },created: function(){
            this.getitems();
            this.getSaves();
            this.getCards();
            this.getOrders();
            this.getInfo();
        }
    })


    </script>
    <script>

        $(document).ready(function(){
            $("button.fa.fa-bars").click(function(){
                $("#pills").toggle();
            });
            $("#MoreInfoOrder").click(function(){
                $("#more-info-order").toggle();
            })
        });

    </script>

</body>
</html>
