@extends('layouts.home')

@section('content')

<div class="row">
    <div class="col-md-2">
        @include('home.spils')
    </div>
    <div class="col-md-10">
        <section id="cards">
                    <div v-if="done">
                        <div class="alert alert-light" role="alert">
                            <p>Your Order Has been Sucsessfuly!</p>
                            <img src="{{asset('/img/5.svg')}}" alt=""><br>
                            <a href="{{url('/cards')}}" class="btn btn-primary">My Card</a>
                        </div>
                    </div>


                    <div class="container"  v-if="!done">
                    <h1>list Shopping Card :</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-item"  v-for="item in dataCards">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img :src="'/public/image/'+item.photo" alt="">
                                        </div>
                                        <div class="col-md-3">
                                            <h5 class="item-card-title">@{{item.title}}</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <p>@{{item.price}}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-warning" @click="deleteCard(item)">Delete</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                        <div class="col-md-6">
                            <section class="check">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" v-model="dataorder.name">

                                    <label for="">Adresse</label>
                                    <input type="text" class="form-control"  name="Adresse" v-model="dataorder.adresse">

                                    <label for="">Email</label>
                                    <input type="text" class="form-control"  name="email" v-model="dataorder.email"></input>

                                    <label for="">City</label>
                                    <input type="text" class="form-control" name="city" v-model="dataorder.city">

                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone" v-model="dataorder.phone">

                                    <button class="btn btn-primary mt-2" @click="addtoOrder()">Make Order !</button>
                            </section>
                        </div>
                    </div>
                </div>

            </section>

    </div>
</div>
@endsection
