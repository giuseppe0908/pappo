@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<h3>New Restaurants</h3>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<form action="{{route('admin.restaurants.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('POST')
				<div class="form-group">
					<label for="name">Name</label>
					<input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}">
					@error('name')
					<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

				<div class="form-group">
					<label for="description">description</label>
					<textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"> {{ old('description') }}</textarea>
					@error('description')
					<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

				<div class="form-group">
					<label for="address">Address</label>
					<input class="form-control @error('address') is-invalid @enderror" id="address" type="text" name="address" value="{{ old('address') }}">
					@error('address')
					<small class="text-danger">{{ $message }}</small>
					@enderror
				</div>

				<div class="form-group">
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
					<option value="{{$category->id}}">{{$category->name}}</option>
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
