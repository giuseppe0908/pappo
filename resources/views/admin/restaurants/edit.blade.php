@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      	<div class="col-md-12">
        	<h3>Modify Restaurant</h3>
      	</div>
    </div>
    <div class="row justify-content-center">
      	<div class="col-md-8">
          	<form action="{{route('admin.restaurants.update', ['restaurant' => $restaurant->id])}}" method="post" enctype="multipart/form-data">
            	@csrf
            	@method('PATCH')

				<div class="form-group">
					<label for="name">Name</label>
					<input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name', $restaurant->name) }}">
					@error('name')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"> {{ old('description', $restaurant->description) }}</textarea>
					@error('description')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>
				
				<div class="form-group">
					<label for="address">Address</label>
					<input class="form-control @error('address') is-invalid @enderror" id="address" type="text" name="address" value="{{ old('address', $restaurant->address) }}">
					@error('address')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

				<div class="form-group">
					<label for="telephone_number">Numero di Telefono</label>
					<input class="form-control @error('telephone_number') is-invalid @enderror" id="telephone_number" type="text" name="telephone_number" value="{{ old('telephone_number', $restaurant->telephone_number) }}">
					@error('telephone_number')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

<!-- 				<div>
					<img src="{{asset($restaurant->photo)}}" alt="">
				</div>
 -->				<div class="form-group">
					<label for="photo">Photo</label>
					<input class="form-control-file @error('photo') is-invalid @enderror" id="photo" type='file' name="photo">
					@error('photo')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

				<div class="form-group">
					<label for="category">Restaurant Category</label>
					<select class="form-control @error('category_ids') is-invalid @enderror" id="category" name="category_ids[]" multiple>
						@foreach($categories as $category)
						<option value="{{$category->id}}" {{$restaurant->categories->contains($category) ? 'selected' : ''}}>{{$category->name}}</option>
						@endforeach
					</select>
					@error('category_ids')
						<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

            	<button class="btn btn-primary" type="submit">Save</button>
          	</form>
		</div>
	</div>
</div>
@endsection