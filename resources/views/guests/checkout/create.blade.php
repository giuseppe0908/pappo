@extends('layouts.user')

@section('content')
<section id="add-food" class="flex">
	<div class="container food-card">
		<div class="row">
			<div class="col-md-12 text-center uppercase">
				<h3>Conferma Ordine</h3>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<form action="{{route('orders.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('POST')
					<input type="hidden" name="restaurant_id" value="{{ $restaurant['id'] }}">

						<div class="form-group">
							<label for="customer_name">Nome</label>
							<input class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" type="text" name="customer_name" value="{{ old('customer_name') }}">
							@error('customer_name')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
							<label for="customer_surname">Cognome</label>
							<input class="form-control @error('customer_surname') is-invalid @enderror" id="customer_surname" type="text" name="customer_surname" value="{{ old('customer_surname') }}">
							@error('customer_surname')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
							<label for="customer_address">Indirizzo</label>
							<input class="form-control @error('customer_address') is-invalid @enderror" id="customer_address" type="text" name="customer_address" value="{{ old('customer_address') }}">
							@error('customer_address')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
	                    	<label for="customer_phone_number">Numero di Telefono</label>
	                    	<input class="form-control @error('customer_phone_number') is-invalid @enderror" id="customer_phone_number" type="text" name="customer_phone_number" value="{{ old('customer_phone_number') }}">
	                   		@error('customer_phone_number')
	                   			<small class="text-danger">{{ $message }}</small>
	                    	@enderror
	                	</div>

						<div class="form-group row">
                            <label for="customer_email">E-mail</label>
                            <input class="form-control @error('customer_email') is-invalid @enderror" id="customer_email" type="email"  name="customer_email" value="{{ old('customer_email') }}" required autocomplete="customer_email">
                            @error('customer_email')
								<small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

						<div class="form-group">
							<label for="total">Totale</label>
							<input class="form-control @error('total') is-invalid @enderror" id="total" type="number" step="0.01" name="total" value="{{ old('total') }}">
							@error('total')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

					<button class="btn btn-dark" type="submit">Conferma</button>
					<a class="btn back" href="{{route('index')}}">Annulla</a>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
