@extends('layouts.user')

@section('content')
<!-- <div class="container">
    <div class="row">
		<div class="col-md-12">
			<h3>{{$restaurant->name}}</h3>
			<p>Category:
			@foreach($restaurant->categories as $category)
				{{$category->name}}
			@endforeach
			</p>
			<img src="{{asset($restaurant->photo)}}" alt="{{$restaurant->name}}">
			<p>{{$restaurant->description}}</p>

			
			@foreach($foods as $food)
				<h4>{{$food->name}}</h4>
				<p>{{$food->description}}</p>
				<p>{{$food->price}}</p>
				{{$food->avaible}}
				<img src="{{asset($food->photo)}}" alt="{{$food->name}}">
				<a href="{{route('admin.foods.edit', ['food' => $food->id])}}">Modifica</a>
			@endforeach

			<span class="btn btn-navbar" onclick="event.preventDefault();
				document.getElementById('getRestaurant').submit();">Aggiungi piatto</span>
			<form id="getRestaurant" action="{{route('admin.getrestaurant', ['id' => $restaurant->id])}}" method="post">
				@csrf
				@method('POST')
				<input type="hidden" name="id" value="{{ $restaurant->id }}">
			</form>
		</div>  
	</div>  
</div> -->
<section id="show-rest">
	<div class="show-container flex">
		<div class="w50 right flex">
			<div class="rest-name">
				<h1>{{$restaurant->name}}</h1>
			</div>
			<div class="rest-category">
				<p>Category:
				@foreach($restaurant->categories as $category)
					{{$category->name}}
				@endforeach
				</p>
			</div>
			<div class="rest-descr">
				<p>{{$restaurant->description}}</p>
			</div>
			<div class="food">
				<div class="card-food">
					@foreach($foods as $food)
						<h4>{{$food->name}}</h4>
						<p>{{$food->ingredients}}</p>
						<p>{{$food->price}}</p>
						{{$food->avaible}}
						<img src="{{asset($food->photo)}}" alt="{{$food->name}}">
						<a class="btn btn-edit" href="{{route('admin.foods.edit', ['food' => $food->id])}}"><i class="far fa-edit"></i></a>
					@endforeach
				</div>
			</div>
			<span class="btn btn-navbar" onclick="event.preventDefault();
				document.getElementById('getRestaurant').submit();">Aggiungi piatto</span>
			<form id="getRestaurant" action="{{route('admin.getrestaurant', ['id' => $restaurant->id])}}" method="post">
				@csrf
				@method('POST')
				<input type="hidden" name="id" value="{{ $restaurant->id }}">
			</form>
		</div>
		<div class="w50 left flex">
			<img src="{{asset($restaurant->photo)}}" alt="{{$restaurant->name}}">
		</div>
	</div>
</section>
@endsection
