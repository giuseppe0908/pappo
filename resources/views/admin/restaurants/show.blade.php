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

        <img src="{{asset($restaurant->cover)}}" alt="{{$restaurant->name}}">
        <p>{{$restaurant->description}}</p>
      </div>
</div>
@endsection