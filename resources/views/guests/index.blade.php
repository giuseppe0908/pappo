@extends('layouts.guest')

@section('page_title')
    Pappo
@endsection

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
@section('content_guest')
<section id="home">
    <div class="home-img flex">
        <div class="l">
            <img src="./img/l.svg" alt="">
        </div>
        <div class="r">
            <img src="./img/r.svg" alt="">
<<<<<<< HEAD
=======
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
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

            <div class="content">
                <div class="title m-b-md">
                    Pappo
                </div>

                <div class="links">

                @foreach($categories as $category)
                    {{$category->name}}
                @endforeach
                </div>
            </div>
>>>>>>> dev
=======
>>>>>>> dev
        </div>
    </div>
    <div class="title">
        <p>EHI AMIGO COSA TI VA DI MANGIARE OGGI?</p>
    </div>
    <div class="btn-home">
        <a href="#plates">SCEGLI QUALCOSA <i class="fas fa-utensils"></i></a>
    </div>
</section>
<section>
    <div id="root">
        <div class="category-card" v-for="category in categories">
            <button>
                @{{category.name}}
            </button>
        </div>
        <div class="restaurants">
            <h1>I PIU' PAPPATI</h1>
            <div class="category-card" v-for="restaurant in restaurants">
                <button>
                    @{{restaurant.name}}
                </button>
            </div>
        </div>
    </div>
</section>

@endsection
