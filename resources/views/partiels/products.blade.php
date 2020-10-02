<div id="products">
    <h1>my products</h1>
    <div class="container">
        <div class="alert" >
            <div class="alert alert-primary" role="alert" v-if="alert1" >
                <p>Your Item Has Saved !</p>
            </div>
            <div class="alert alert-success" role="alert" v-if="alert2" >
                <p>Your Item Has Added To Cart !</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" v-for="prod in data">
                <div class="card">
                        <img class="card-img-top" :src="'/public/image/'+prod.photo">
                        <div class="card-body">
                                <p class="card-text">@{{prod.price}}</p>
                                <div class="overlay">
                                    <h4 class="card-title">@{{prod.title}}</h4>
                                    <div class="buttons">
                                        <button class="btn btn-primary" @click="save(prod)"><i class="fa fa-bookmark"></i></button>
                                        <button class="btn btn-primary" @click="addToCart(prod)"><i class="fa fa-plus"></i></button>
                                        <a class="btn btn-primary" :href="'show/'+prod.id"><i class="fa fa-eye"></i></a>
                                    </div>

                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
