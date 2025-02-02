@extends('layouts.user')

@section('content')

<section id="user-register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="panel_container">
                <h1 class="">Il Tuo Pannello di Controllo</h1>
            </div>
            <div class="col-md-8 flex">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="my_card">
                    <a href="{{route('admin.restaurants.index')}}">
                        I Tuoi Ristoranti
                    </a>
                    <div class="img_cont_cards">
                        <img src="./img/box.png" alt="">
                    </div>
                    <div class="p_cont">
                        <p>Gestisci i dati del tuo Ristorante o aggiungine uno nuovo.</p>
                    </div>
                </div>
                <div class="my_card">
                    <a href="{{route('admin.restaurants.index')}}">
                        Le Tue Statistiche
                    </a>
                    <div class="img_cont_cards">
                        <img <img src="./img/order.png" alt="">
                    </div>
                    <div class="p_cont">
                        <p>Rimani sempre aggiornato sulle tue vendite.</p>
                    </div>
                </div>
                <div class="my_card">
                    <a href="{{route('orders.index')}}">
                        Ordini Ricevuti
                    </a>
                    <div class="img_cont_cards">
                        <img <img src="./img/bag.png" alt="">
                    </div>
                    <div class="p_cont">
                        <p>Scopri quali sono i piatti del tuo menu preferiti dai nostri clienti.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
