@extends('layouts.user')

@section('content')
<section id="restaurants-index">
<div class="container">
	<div class="rest-index-title text-center">
		<h1>i tuoi ristoranti</h1>
	</div>
		<div class="row">
			@foreach ($restaurants as $restaurant)
				<div class="card">
					<div class="card-img">
						<img src=".{{$restaurant->photo}}" alt="">
					</div>
					<a class="text-center rest-title" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug])}}"><h2>{{$restaurant->name}}</h2></a>
					<div class="card-body">
						<div class="card-content flex">
							<a class="btn-edit" href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->id])}}">Modifica</a>
							<form action="{{route('admin.restaurants.destroy', ['restaurant' => $restaurant->id])}}" method="post">
								@csrf
								@method('DELETE')
								<input class="btn-delete" type="submit" name="" value="Elimina">
							</form>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="row flex add-rest">
			<div class="btn btn-add-rest">
				<a class="btn-add" href="{{route('admin.restaurants.create')}}">Nuovo Ristorante</a>
			</div>
			<div class="back">
				<a class="" href="{{route('admin.index')}}">Indietro</a>
			</div>
		</div>	
	</div>
	<div class="ramen-r">
		<img src="../img/ramen.png" alt="plate">
	</div>
	<div class="plate-l">
		<img src="../img/plate.png" alt="plate">
	</div>
</section>
@endsection
