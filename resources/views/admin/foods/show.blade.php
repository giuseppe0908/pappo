@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-md-12">
	        <h3>{{$food->name}}</h3>
    	    {{--<p>Category: 
        	@foreach($food->categories as $category)
            	{{$category->name}}
        	@endforeach
        	</p>--}}

        	<img src="{{asset($food->photo)}}" alt="{{$food->name}}">
        	<p>{{$food->description}}</p>
      	</div>
	</div>	  
</div>
@endsection