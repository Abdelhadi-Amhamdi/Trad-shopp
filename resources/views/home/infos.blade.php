@extends('layouts.home')

@section('content')

<div class="row">
    <div class="col-md-2">
        @include('home.spils')
    </div>
    <div class="col-md-10">
        <div class="container" id="info">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">


                        <label for="">Name :</label>
                        <input type="text" class="form-control" v-model="DataInfo.name" id="name">

                        <label for="">Email :</label>
                        <input type="text" class="form-control" v-model="DataInfo.email" id="email">

                        <label for="">Phone :</label>
                        <input type="phone" class="form-control" v-model="DataInfo.phone" id="numberPhone">

                        <label for="">City :</label>
                        <input type="text" class="form-control" v-model="DataInfo.city" id="city">

                        <label for="">Adresse :</label>
                        <input type="text" class="form-control" v-model="DataInfo.adresse" id="adresse">
                    
                        <br>
                        <button class="btn btn-primary btn-block" @click="loadInfo()">Save</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection 