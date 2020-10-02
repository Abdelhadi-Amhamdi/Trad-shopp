    @extends('layouts.main')



    @section('content')

        <div id="show">

                <div class="row">
                        <div class="col-md-12">
                            @include('partiels.navbar')
                        </div>
                </div>




                <div class="container">

                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{asset('/storage/'.$item->photo)}}" alt="">
                        </div>
                        <div class="col-md-6">
                            <h1>{{$item->title}}</h1>
                            <h5>{{$item->price}}</h5>
                            <p>{{$item->description}}</p>
                            <div class="buttons">
                                <a href="" class="btn btn-primary">Add To Cart</a>
                                <a href="" class="btn btn-primary">Save</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container">
                        <hr>

                        <div class="header">
                                <h3>Relased Products :</h3>

                        </div>
                        <div class="owl-carousel owl-theme slider">
                            @foreach($items as $prod)
                                <div class="item">
                                <img src="{{asset('/public/image/'.$prod->photo)}}" alt="">
                                    <div class="overlay">
                                    <h4>{{$prod->title}}</h4>
                                    <h5>{{$prod->price}}</h5>
                                        <div class="buttons">
                                            <div class="btn btn-primary"><i class="fa fa-plus"></i></div>
                                            <div class="btn btn-primary"><i class="fa fa-bookmark-o"></i></div>
                                            <div class="btn btn-primary"><i class="fa fa-eye"></i></div>
                                        </div>



                                    </div>
                                </div>
                            @endforeach
                        <div>
                </div>


        </div>


    @endsection

