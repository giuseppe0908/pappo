@extends('layouts.user')

@section('content')
<section class="edit-food">
  <div class="container">

				<div class="form-group">
					<label for="name">Nome</label>
					<input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name', $food->name) }}">
					@error('name')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

                <div class="row">
                    <div class="col-md-12">
                      <h1>Modifica Piatto</h1>
                    </div>
                </div>

				<div class="form-group">
					<label for="price">Prezzo</label>
					<input class="form-control @error('price') is-invalid @enderror" id="price" type="number" step="0.01" name="price" value="{{ old('price', $food->price) }}">
					@error('price')
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
					<label for="photo">Fotografia</label>
					<input class="form-control-file @error('photo') is-invalid @enderror" id="photo" type='file' name="photo">
					@error('photo')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>
				<div>
					<img src="{{asset($food->photo)}}" alt="">
				</div>
				<button class="btn btn-primary" type="submit">Salva</button>
				<a class="btn back" href="{{route('admin.restaurants.index')}}">Indietro</a>
          	</form>
      	</div>
    </div>
</div>
@endsection
