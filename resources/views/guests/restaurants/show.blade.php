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
									<p class="uppercase cart" style="margin-bottom: 0; cursor: pointer" @click="addCart($food->id)">Aggiungi <i class="fas fa-shopping-cart"></i></p>
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
		</div>
		<div class="cart flex" v-if="carrello">
			<div class="cart-name"><span>Piatto</span></div>
			<div class="cart-quant"><span>Q.ta</span></div>
			<div class="cart-sub"><span>Prezzo</span></div>
			<div v-for>

			
			</div>
			<div class="cart-total"><span>Totale</span></div>
			<div class="cart-checkout"><a href="" class="btn">CHECKOUT</a></div>
		</div>
	</section>
</div>
@endsection
