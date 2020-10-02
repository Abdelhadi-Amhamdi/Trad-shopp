@extends('layouts.home')

@section('content')

<div class="row">
    <div class="col-md-2">
        @include('home.spils')
    </div>
    <div class="col-md-10 col-sm-12">
        <div class="container" id="orders">
            <ul class="list-group" v-for="order in ordersData">
                <li class="list-item">
                    <div class="row">
                        <div class="col-md-2">
                            <img :src="'/public/image/'+order.photo" alt="">
                        </div>
                        <div class="col-md-2">
                            <h5>@{{order.title}}</h5>
                        </div>
                        <div class="col-md-2">
                            <p>@{{order.price}}</p>
                        </div>
                        <div class="col-md-2">
                            <p>asked by : @{{order.name}}</p>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-success pull-right" @click="deleteOrder(order)">Mark as complet</button>
                            <button class="btn btn-primary pull-right" id="MoreInfoOrder">More</button>
                        </div>
                        <div class="col-md-12" id="more-info-order">
                            <p>adresse : @{{order.adresse}}</p>
                            <p>email : @{{order.email}}</p>
                            <p>phone : @{{order.phone}}</p>
                            <p>city : @{{order.city}}</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection
