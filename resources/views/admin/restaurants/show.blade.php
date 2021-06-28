@extends('layouts.user')

@section('content')
<section id="show-rest" class="flex">
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
								<a  href="{{route('admin.foods.edit', ['food' => $food->restaurant_id])}}" class="btn btn-edit"><i class="far fa-edit"></i></a>
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
								<a href="" class="btn btn-edit"><i class="far fa-edit"></i></a>
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
					<div class="add-food">
						<span class="btn add-menu" onclick="event.preventDefault();
						document.getElementById('getRestaurant').submit();">Aggiungi piatto</span>
						<form id="getRestaurant" action="{{route('admin.getrestaurant', ['id' => $restaurant->id])}}" method="post">
							@csrf
							@method('POST')
							<input type="hidden" name="id" value="{{ $restaurant->id }}">
						</form>
					</div>
					<div class="back">
						<a class="" href="{{route('admin.restaurants.index')}}">Indietro</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
