@extends('layouts.user')

@section('content')
<section id="add-food " class="flex">
	<div id="root">
	<div class="container food-card">
		<div class="row">
			<div class="col-md-12 text-center uppercase">
				<h3>Conferma Ordine</h3>
				<div id="dropin-container"></div>
				<button class="button button--small button--green">Purchase</button>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<a href="http://localhost:8000/">Conferma Ordine</a>
			</div>
		</div>
	</div>
	</div>
</section>
@endsection
