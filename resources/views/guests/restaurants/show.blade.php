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

			
			@foreach($foods as $food)
				<h4>{{$food->name}}</h4>
				<p>{{$food->price}}</p>
				<p>{{$food->ingredients}}</p>
				{{$food->avaible}}
				<img src="{{asset($food->photo)}}" alt="{{$food->name}}">
			@endforeach

		</div>  
	</div>  
</div>
@endsection
