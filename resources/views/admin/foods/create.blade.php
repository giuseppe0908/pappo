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
              <label for="price">Prezzo</label>
              <input class="form-control @error('price') is-invalid @enderror" id="price" type="number" min="1" step="any" name="price" value="{{ old('price') }}">
              @error('price')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="available">Disponibilità</label>
              <select class="form-control @error('available') is-invalid @enderror" id="available" name="available">
                <option value="1" {{ old('available') == 1 ? 'selected' : '' }}>Disponibile</option>
                <option value="0"{{ old('available') == 0 ? 'selected' : '' }}>Non disponibile</option>
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

            

            <button class="btn btn-primary" type="submit">Salva</button>
          </form>
      </div>
    </div>
</div>
@endsection