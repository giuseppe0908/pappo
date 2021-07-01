@extends('layouts.guest_show')

@section('content')
<div id="root">
	<section id="guest-show">
		<div class="container-show">
			<div class="content flex">
				<div class="w50 l">
					<h1>{{$restaurant->name}}</h1>
					<p>Category:
					@foreach($restaurant->categories as $category)
						{{$category->name}}
					@endforeach
					</p>
					<p class="descr">{{$restaurant->description}}</p>
					<h4 class="menu">Menu:</h4>
					<div class="menu-wrapper flex">
					@foreach($foods as $food)
						@if($food->available == 1)
						<div class="menu-card">
							<div class="menu-img">
								<img src="{{asset($food->photo)}}" alt="{{$food->name}}">
							</div>
							<div class="menu-title">
								<h4>{{$food->name}}</h4>
							</div>
							<div class="menu-ingredients">
								<p>Ingredienti: {{$food->ingredients}}</p>
							</div>
							<div class="card-cmd flex">
								<p style="margin-bottom: 0">{{$food->price}} €</p>
								<p class="uppercase carrellino" style="margin-bottom: 0; cursor: pointer" @click="addCart({{$food}},1)">Aggiungi <i class="fas fa-shopping-cart"></i></p>
							</div>
						</div>
						@else
						<div class="menu-card disabled">
							<div class="menu-img">
								<img src="{{asset($food->photo)}}" alt="{{$food->name}}">
							</div>
							<div class="menu-title">
								<h4>{{$food->name}}</h4>
							</div>
							<div class="menu-ingredients">
								<p>Ingredienti: {{$food->ingredients}}</p>
							</div>
							<div class="card-cmd flex">
								<p style="margin-bottom: 0">{{$food->price}} €</p>
								<p class="uppercase carrellino" style="margin-bottom: 0; cursor: no-drop; background-color: lightcoral">Non Disponibile <i class="fas fa-ban"></i></p>							
							</div>
						</div>
						@endif
					@endforeach
					</div>
				</div>
				<div class="w50 r">
					<img src="{{asset($restaurant->photo)}}" alt="{{$restaurant->name}}">
					<div class="infos">
						<h4>Info</h4>
						<p>Indirizzo: {{$restaurant->address}}</p>
						<p>Telefono: {{$restaurant->telephone_number}}</p>
					</div>
					<div class="menu-cmd flex">
						<div class="back">
							<a class="" href="{{route('index')}}">Indietro</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="cart flex" id="carrello" style="width: 480px" v-if="carrello != '' ">
            <div class="cart-name head"><span>Piatto</span></div>
            <div class="cart-quant head"><span>Q.ta</span></div>
            <div class="cart-sub head"><span>Prezzo</span></div>
            <div v-for="order in carrello" class="flex riga" style="flex-wrap: wrap; width: 100%; background-color: #fff">
                <div class="cart-name"><span>@{{order.name}}</span></div>
                <div class="cart-quant">
                    <span @click="meno(order.id)" class="head">-</span>
                    <span style="padding:0 5 px">@{{order.quantity}}</span>
                    <span @click="aggiungi(order.id)" class="head">+</span>
                </div>
                <div class="cart-sub flex">
					<span>@{{order.price * order.quantity}} €</span>
					<span @click="cancellaItem(order.id)" class="del">x</span>
				</div>
            </div>
            <div class="cart-total flex" v-if="carrello != '' " ><span>Totale: @{{carrelloTotale}} €</span></div>
            <div class="cart-checkout flex">
                <a href="" class="btn">CHECKOUT</a>
                <p style="margin-bottom: 0" @click="svuota()" class="btn uppercase">svuota</p>
            </div>
        </div>

	</section>
</div>
@endsection
