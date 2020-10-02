@extends('layouts.home')

@section('content')

<div class="row">
    <div class="col-md-2">
        @include('home.spils')
    </div>

    <div class="col-md-10" id="main">
    <section id="items">
            <div class="container">



            <div
                class="form-group form-data"
                v-if="add"
            >

                <label for="file">image</label>
                <input type="file" id="file" name="image" class="form-control" @change="loadimage($event)">

                <label for="">Title</label>
                <input type="text" class="form-control" id="title"  >

                <label for="">Description</label>
                <textarea type="text" class="form-control" id="description" ></textarea>

                <label for="">Price</label>
                <input type="text" class="form-control" id="price">

                <div class="row mt-2">
                    <div class="col-md-10">
                        <button class="btn btn-primary btn-block" @click="newItem()">add</button>
                    </div>
                    <div class="col-md-2">
                    <button
                        class="btn btn-warning btn-block"
                        @click="add = false"
                    >cancel </button>
                    </div>
                </div>

            </div>


            <div
                class="form-group form-data"
                v-if="edit"
            >

                <label for="file">image</label>
                <input type="file" id="file" name="image" class="form-control" @change="loadimage($event)">

                <label for="">Title</label>
                <input type="text" class="form-control"  v-model="currentItem.title" >

                <label for="">Description</label>
                <textarea type="text" class="form-control"  v-model="currentItem.description"></textarea>

                <label for="">Price</label>
                <input type="text" class="form-control"  v-model="currentItem.price">

                <div class="row mt-2">
                    <div class="col-md-10">
                        <button class="btn btn-primary btn-block" @click="editItem()">edit</button>
                    </div>
                    <div class="col-md-2">
                    <button
                        class="btn btn-warning btn-block"
                        @click="edit = false"
                    >cancel </button>
                    </div>
                </div>

            </div>
            <div class="row">
                <button
                        class="btn btn-success pull-right"
                        @click="add = true"
                >add new </button><br>
            </div>

            <div class="row">
                <div class="col-md-3" v-for="item in data ">
                   <div class="card mt-2">
                       <img class="card-img-top" :src="'/public/image/'+item.photo" />
                       <div class="card-body">
                           <h5 class="card-title">@{{item.title}}</h5>
                           <p class="card-text">@{{item.price}}</p>
                                <button class="btn btn-danger " @click="DeleteItem(item)">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a :href="'show/'+item.id" class="btn btn-primary ">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <button @click="edit = true , currentItem = item"  class="btn btn-warning ">
                                    <i class="fa fa-pencil"></i>
                                </button>
                       </div>
                   </div>
                </div>
            </div>


            </div>
        </section>

    </div>

</div>

@endsection
