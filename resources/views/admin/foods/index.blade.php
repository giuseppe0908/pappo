@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      	<div class="col-md-12">
        	<a href="{{route('admin.foods.create')}}">New foods</a>
      	</div>
    </div>
    <div class="row justify-content-center">
      	@foreach ($foods as $food)
        	<div class="col-md-3">
            	<div class="card">
                	<div class="card-header"><a href="{{route('admin.foods.show', ['food' => $food->slug])}}">{{$food->name}}</a></div>

                	<div class="card-body">	
                  	{{$food->desciption}}

                  		<div class="">
                    		<a href="{{route('admin.foods.edit', ['food' => $food->id])}}">Edit</a>
                    		<form action="{{route('admin.foods.destroy', ['food' => $food->id])}}" method="post">
                        		@csrf
                        		@method('DELETE')
                    	    	<input type="submit" name="" value="Delete">
                    		</form>
                  		</div>
                	</div>
            	</div>
        	</div>
      	@endforeach
    </div>
</div>
@endsection