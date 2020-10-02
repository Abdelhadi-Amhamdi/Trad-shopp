@extends('layouts.home')

@section('content')
<div class="row">
    <div class="col-md-2">
        @include('home.spils')
    </div>
    <div class="col-md-10">
        <section id="saves" class="container">

            <h1>list of saved items :</h1>

                <ul class="list-group" v-for="item in dataSaves">

                        <li class="list-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <img :src="'/public/image/'+item.photo" alt="">
                                </div>
                                <div class="col-md-2">
                                    <h5>@{{item.title}}</h5>
                                </div>
                                <div class="col-md-4">
                                    <p>@{{item.price}}</p>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-danger" @click="deleteSave(item)">Delete</button>
                                    <a :href="'show/'+item.id" class="btn btn-primary" >Show</a>
                                </div>

                            </div>
                        </li>

                </ul>

        </section>
    </div>
</div>

@endsection
