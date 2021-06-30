@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<h3>Nuovo Ristorante </h3>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<form action="{{route('admin.restaurants.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('POST')
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
					<label for="address">Indirizzp</label>
					<input class="form-control @error('address') is-invalid @enderror" id="address" type="text" name="address" value="{{ old('address') }}">
					@error('address')
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

                <div class="form-group">
                    <label for="telephone_number">Numero di Telefono</label>
                    <input class="form-control @error('telephone_number') is-invalid @enderror" id="telephone_number" type="text" name="telephone_number" value="{{ old('telephone_number') }}">
                    @error('telephone_number')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

				<div class="form-group">
					<label for="category">Categoria Ristorante</label>
					<select class="form-control @error('category_ids') is-invalid @enderror" id="category" name="category_ids[]" multiple>
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
					@error('category_ids')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

				<button class="btn btn-primary" type="submit">Salva</button>
			</form>
		</div>
	</div>
</div>
@endsection
