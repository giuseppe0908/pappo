@extends('layouts.guest_show')

@section('content')

<!-- <script src="https://js.braintreegateway.com/web/dropin/1.10.0/js/dropin.js"></script> -->

<div id="root">
	<section id="guest-show" v-if="scompari">
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
			<div class="add-food">
			
			<button @click="salvataggio"> Checkout </button>
						{{-- <span class="btn add-menu" onclick="event.preventDefault();
						document.getElementById('getRestaurant').submit();">Checkout</span>
						<form id="getRestaurant" action="{{route('getrestaurant', ['id' => $restaurant->id])}}" method="post">
							@csrf
							@method('POST')
							<input type="hidden" name="id" value="{{ $restaurant->id }}">
						</form> --}}
					</div>
                <p @click="svuota()" href="" class="btn">X</p>
            </div>

			
        </div>

	</section>

	<div class="checkout" v-if="!scompari">
	<section id="add-food " class="flex">
	<div class="container food-card">
		<div class="row">
			<div class="col-md-12 text-center uppercase">
				<h3>Conferma Ordine</h3>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<form id="payment-form" action="{{route('orders.store')}}" method="post"  enctype="multipart/form-data">
					@csrf
					@method('POST')
					<input type="hidden" name="restaurant_id" value="{{ $restaurant['id'] }}">

						<div class="form-group">
							<label for="customer_name">Nome</label>
							<input v-model="customer_name" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" type="text" name="customer_name" value="{{ old('customer_name') }}">
							@error('customer_name')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
							<label for="customer_surname">Cognome</label>
							<input  v-model="customer_surname" class="form-control @error('customer_surname') is-invalid @enderror" id="customer_surname" type="text" name="customer_surname" value="{{ old('customer_surname') }}">
							@error('customer_surname')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
							<label for="customer_address">Indirizzo</label>
							<input v-model="customer_address" class="form-control @error('customer_address') is-invalid @enderror" id="customer_address" type="text" name="customer_address" value="{{ old('customer_address') }}">
							@error('customer_address')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
	                    	<label for="customer_phone_number">Numero di Telefono</label>
	                    	<input v-model="customer_phone_number"  class="form-control @error('customer_phone_number') is-invalid @enderror" id="customer_phone_number" type="text" name="customer_phone_number" value="{{ old('customer_phone_number') }}">
	                   		@error('customer_phone_number')
	                   			<small class="text-danger">{{ $message }}</small>
	                    	@enderror
	                	</div>

						<div class="form-group row">
                            <label for="customer_email">E-mail</label>
                            <input v-model="customer_email" class="form-control @error('customer_email') is-invalid @enderror" id="customer_email" type="email"  name="customer_email" value="{{ old('customer_email') }}" required autocomplete="customer_email">
                            @error('customer_email')
								<small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

						<div class="form-group">
							<label for="total">Totale</label>

							<input type="number" id="total" name="total">

						</div>

						<form>
						<div id="payment-form"></div>
						<!-- <div class="wrapper">
							<div id="dropin-container"></div>
						</div> -->
						<button id="submit-button" class="button button--small button--green btn btn-dark" @click="paga()">Purchase</button>
						<!-- <button id="submit-button" type="submit">Submit Order</button> -->
						</form>

					

					<!-- <button class="btn btn-dark" type="submit">Conferma</button> -->
					<a class="btn back" href="{{route('index')}}">Annulla</a>
				</form>
			</div>
		</div>
	</div>
	</div>
</section>

</div>
		
<style>
	.flex{
		padding-top: 100px;
	}
</style>
@endsection
