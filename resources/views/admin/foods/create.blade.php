@extends('layouts.user')

@section('content')
<section id="add-food" class="flex">
	<div class="container food-card">
		<div class="row">
			<div class="col-md-12 text-center uppercase">
				<h3>Aggiungi Piatto</h3>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<form action="{{route('admin.foods.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('POST')
					<input type="hidden" name="restaurant_id" value="{{ $restaurant['id'] }}">
						<div class="form-group">
							<label for="name">Nome</label>
							<input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}">
							@error('name')
							<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
							<label for="description">Descrizione</label>
							<textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"> {{ old('description') }}</textarea>
							@error('description')
							<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
							<label for="ingredients">Ingredienti</label>
							<input class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" type="text" name="ingredients" value="{{ old('ingredients') }}">
							@error('ingredients')
							<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
							<label for="price">Prezzo</label>
							<input class="form-control @error('price') is-invalid @enderror" id="price" type="number" step="0.01" name="price" value="{{ old('price') }}">
							@error('price')
							<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
							<label for="available">Disponibilità</label>
							<select class="form-control @error('available') is-invalid @enderror" id="available" name="available">
								<option value="0"{{ old('available') == 0 ? 'selected' : '' }}>Non disponibile</option>
								<option value="1" {{ old('available') == 1 ? 'selected' : '' }}>Disponibile</option>
							</select>
							@error('available')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
							<label for="photo">Foto</label>
							<input class="form-control-file @error('photo') is-invalid @enderror" id="photo" type='file' name="photo">
								@error('photo')
								<small class="text-danger">{{ $message }}</small>
								@enderror
						</div>
					<button class="btn btn-dark" type="submit">Salva</button>
					<a class="btn back" href="{{route('admin.restaurants.index')}}">Indietro</a>
				</form>
			</div>
		</div>
	</div>
	<div class="food-img">
		<img src="../img/foods.png" alt="food">
	</div>
</section>
@endsection
