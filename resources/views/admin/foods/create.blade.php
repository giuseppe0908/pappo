@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>New foods</h3>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
          <form action="{{route('admin.foods.store')}}" method="post" enctype="multipart/form-data">
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
              <label for="desciption">Desciption</label>
              <textarea class="form-control @error('desciption') is-invalid @enderror" id="desciption" name="desciption"> {{ old('desciption') }}</textarea>
              @error('desciption')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="price">Price</label>
              <input class="form-control @error('price') is-invalid @enderror" id="price" type="text" name="price" value="{{ old('price') }}">
              @error('price')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="available">Available</label>
              <select class="form-control @error('available') is-invalid @enderror" id="available" name="available" multiple>
                <option value="true">true</option>
                <option value="false">false</option>
              </select>
              @error('available')
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

            

            <button class="btn btn-primary" type="submit">Save</button>
          </form>
      </div>
    </div>
</div>
@endsection