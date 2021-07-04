@extends('layouts.user')

@section('content')
<script src="https://js.braintreegateway.com/web/dropin/1.10.0/js/dropin.js"></script>

<section id="add-food " class="flex">
	<div id="root">
	<div class="container food-card">
		<div class="row">
			<div class="col-md-12 text-center uppercase">
				<h3>Conferma Ordine</h3>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<form id="payment-form"  enctype="multipart/form-data">
					
					
					<input type="hidden" name="restaurant_id" value="{{ $restaurant['id'] }}">

						<div class="form-group">
							<label for="customer_name">Nome</label>
							<input v-model="customer_name" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" type="text" name="customer_name" value="{{ old('customer_name') }}">
							@error('customer_name')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
							<label for="customer_surname">Cognome</label>
							<input  v-model="customer_surname" class="form-control @error('customer_surname') is-invalid @enderror" id="customer_surname" type="text" name="customer_surname" value="{{ old('customer_surname') }}">
							@error('customer_surname')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
							<label for="customer_address">Indirizzo</label>
							<input v-model="customer_address" class="form-control @error('customer_address') is-invalid @enderror" id="customer_address" type="text" name="customer_address" value="{{ old('customer_address') }}">
							@error('customer_address')
								<small class="text-danger">{{ $message }}</small>
							@enderror
						</div>

						<div class="form-group">
	                    	<label for="customer_phone_number">Numero di Telefono</label>
	                    	<input v-model="customer_phone_number"  class="form-control @error('customer_phone_number') is-invalid @enderror" id="customer_phone_number" type="text" name="customer_phone_number" value="{{ old('customer_phone_number') }}">
	                   		@error('customer_phone_number')
	                   			<small class="text-danger">{{ $message }}</small>
	                    	@enderror
	                	</div>

						<div class="form-group row">
                            <label for="customer_email">E-mail</label>
                            <input v-model="customer_email" class="form-control @error('customer_email') is-invalid @enderror" id="customer_email" type="email"  name="customer_email" value="{{ old('customer_email') }}" required autocomplete="customer_email">
                            @error('customer_email')
								<small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

						<div class="form-group">
							<label for="total">Totale</label>
							<!-- <input  v-model="total"  class="form-control @error('total') is-invalid @enderror" id="total" type="number" step="0.01" name="total" value="{{ old('total') }}"> -->
							<p v-model="total"> @{{carrelloTotale}} €</p>
							<!-- @error('total')
								<small class="text-danger">{{ $message }}</small>
							@enderror -->
						</div>

						<form>
						<div id="payment-form"></div>
						<div class="wrapper">
							<div id="dropin-container"></div>
						</div>
						<button id="submit-button" class="button button--small button--green btn btn-dark" @click="paga()">Purchase</button>
						<!-- <button id="submit-button" type="submit">Submit Order</button> -->
						</form>

						

					<!-- <button class="btn btn-dark" type="submit">Conferma</button> -->
					<a class="btn back" href="{{route('index')}}">Annulla</a>
				</form>
			</div>
		</div>
	</div>
	</div>
</section>
@endsection
