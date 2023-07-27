@extends('layouts.user')
@section('content')

@extends('layouts.user')

@section('content')
<section id="show-rest" class="flex">
	<div class="container-show">
		<div class="content flex">
			<div class="w50 lef">
            <ul class="pl-2">

            @forelse ($orders as $order)
                <tr>
                    <td>
                        {{ $order->customer_name}}   {{ $order->customer_surna }} </a>
                    </td>
                    
                </tr>            
                    @empty
                @endforelse
				
			
		</div>
	</div>
</section>
@endsection


@endsection
