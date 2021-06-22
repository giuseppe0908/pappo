@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>{{$restaurant->name}}</h3>
        <p>Category:
          @foreach($restaurant->categories as $category)
            {{$category->name}}
          @endforeach
        </p>
        <img src="{{asset($restaurant->photo)}}" alt="{{$restaurant->name}}">
        <p>{{$restaurant->description}}</p>
        
        <span class="btn btn-navbar" onclick="event.preventDefault();
                                    document.getElementById('getRestaurant').submit();">Aggiungi piatto</span>
                <form id="getRestaurant" action="{{route('admin.getrestaurant', ['id' => $restaurant->id])}}" method="post">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id" value="{{ $restaurant->id }}">
                </form>
      </div>  

</div>
@endsection
