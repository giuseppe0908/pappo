@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      	<div class="col-md-12">
        	<h3>Modifica Piatto</h3>
      	</div>
    </div>
    <div class="row justify-content-center">
      	<div class="col-md-8">
          	<form action="{{route('admin.foods.update', ['food' => $food->id])}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PATCH')

				<div class="form-group">
					<label for="name">Name</label>
					<input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name', $food->name) }}">
					@error('name')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

				<div class="form-group">
					<label for="description">Descrizione</label>
					<textarea class="form-control @error('desciption') is-invalid @enderror" id="description" name="description"> {{ old('description', $food->description) }}</textarea>
					@error('description')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

				<div class="form-group">
					<label for="ingredients">Ingredienti</label>
					<input class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" type="text" name="ingredients" value="{{ old('ingredients', $food->ingredients) }}">
					@error('ingredients')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

				<div class="form-group">
					<label for="price">Price</label>
					<input class="form-control @error('price') is-invalid @enderror" id="price" type="number" step="0.01" name="price" value="{{ old('price', $food->price) }}">
					@error('price')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

				<div class="form-group">
					<label for="available">Disponibilità</label>
					<select class="form-control @error('available') is-invalid @enderror" id="available" name="available">
						<option value="1" {{ old('available', $food->available) == 1 ? 'selected' : ' ' }}>Disponibile</option>
						<option value="0" {{ old('available', $food->available) == 0 ? 'selected' : ' ' }}>Non disponibile</option>
					</select>
					@error('available')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

				<div>
					<img src="{{asset($food->photo)}}" alt="">
				</div>
				<div class="form-group">
					<label for="photo">Photo</label>
					<input class="form-control-file @error('photo') is-invalid @enderror" id="photo" type='file' name="photo">
					@error('photo')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>
				<button class="btn btn-primary" type="submit">Save</button>
          	</form>
      	</div>
    </div>
</div>
@endsection
