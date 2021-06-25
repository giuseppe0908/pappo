@extends('layouts.user')

@section('content')
<section id="restaurants-index">
	<div class="restaurants-jumbo">
	</div>
	<div class="container">
 		<div class="row">
			<div class="col-md-12">
				<a href="{{route('admin.restaurants.create')}}">Nuovo Ristorante QUI</a>
			</div>
		</div>
		<div class="row">
			@foreach ($restaurants as $restaurant)
				<div class="card">
					<div class="card-img">
						<img src=".{{$restaurant->photo}}" alt="">
					</div>
					<a href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug])}}">{{$restaurant->name}}</a>
					<div class="card-body">
						<div class="">
							<a href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->id])}}">Modifica</a>
							<form action="{{route('admin.restaurants.destroy', ['restaurant' => $restaurant->id])}}" method="post">
								@csrf
								@method('DELETE')
								<input type="submit" name="" value="Elimina">
							</form>
						</div>
					</div>
				</div>
			@endforeach
		</div>	
	</div>
</section>
@endsection
