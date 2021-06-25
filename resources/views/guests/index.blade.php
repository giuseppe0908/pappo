@extends('layouts.guest')

@section('page_title')
    Pappo
@endsection

@section('content_guest')
<section id="home">
    <div class="home-img flex">
        <div class="l">
            <img src="./img/l.svg" alt="">
        </div>
        <div class="r">
            <img src="./img/r.svg" alt="">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('admin.index') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <div class="title">
        <p>EHI AMIGO COSA TI VA DI MANGIARE OGGI?</p>
    </div>
    <div class="btn-home">
        <a href="#anchor-categories">SCEGLI QUALCOSA <i class="fas fa-utensils"></i></a>
    </div>
    <div id="anchor-categories"></div>
</section>
<section id="restaurants">
    <div id="root">
        <!-- card categorie -->
        <div class="restaurants-container" id="categories">
            <h1 class="text-center">SCEGLI COSA TI VA DI MANGIARE</h1>
            <div class="categories-wrapper flex">
                <div class="row">
                    <div class="category-card flex" v-for="category in categories" @click="restaurantByCategory(category.id)">
                        <div class="card-content">
                            <div class="category-icons flex">
                                <img :src="category.img" :alt="category.name">
                            </div>
                        </div>
                        <p style="color: teal" class="text-center">@{{category.name}}</p>
                    </div>
                </div> 
            </div>
            <!-- card ristoranti -->
            <div class="restaurants text-center">
                <h1>I PIU' PAPPATI</h1>
                <div class="row">
                    <div class="restaurant-card" v-for="restaurant in restaurants">
                        <div class="restaurant-content flex">
                            <div class="restaurant-img">
                                <img :src="restaurant.photo" alt="restaurant-photo">
                            </div>
                            <div class="card-text">
                                <div class="card-title">
                                    <a :href="'restaurants/' + restaurant.slug">
                                        <h2>@{{restaurant.name}}</h2>
                                    </a>
                                </div>
                                <div class="card-categories">
                                    <p style="margin-bottom: 0px">categorie</p>
                                </div>
                                <div class="card-bottom">
                                    <div class="card-address flex">
                                        <img src="./img/location.svg" alt="location">
                                        <p style="margin-bottom: 0px">@{{restaurant.address}}</p>
                                    </div>
                                    <div class="card-phone flex">
                                        <img src="./img/device-mobile.svg" alt="mobilephone">
                                        <p style="margin-bottom: 0px">@{{restaurant.telephone_number}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>    
            </div>
        </div>
        <!-- immagini angoli sezione -->
        <div class="img-up-l">
            <img src="./img/leaves.png" alt="leaves">
        </div>
        <div class="img-down-r">
            <img src="./img/leaves.png" alt="leaves">
        </div>
    </div>
</section>

@endsection
