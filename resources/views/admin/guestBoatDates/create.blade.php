@php use Carbon\Carbon; @endphp
@extends('layouts.main')

@section('main')
	<div>
		<x-btn-back route="{{ route('admin.guestBoatDates.index') }}"/>
		<x-form name="frm" method="post" :action="route('admin.guestBoatDates.store')" class="w-half mt-3">
			<x-form-checkbox id="is_paid" name="is_paid" label="Ist Bezahlt" class="mb-0 pb-0"/>
			<x-form-input id="name" name="name" label="Boots Name" placeholder="Boots Name" required
						  autocomplete="off"/>
			<ul class="d-none autocomplete"></ul>
			<x-form-input class="calc" id="length" name="length" type="number" step="1" min="1" label="Boots Länge"
						  placeholder="Boots Länge" required/>
			<x-form-input id="home_port" name="home_port" label="Heimathafen" placeholder="Heimathafen"/>
			<x-form-input id="email" name="email" label="Email" placeholder="Email-Adresse"/>

			<x-form-select class="mt-1 @if($berthHasPrice)calc@endif" name="berth_id" label="Liegplatz"
						   :options="$berthOptions" required/>
			<x-form-input class="calc" id="from" name="from" type="date" label="Von"
						  default="{{ Carbon::today()->format('Y-m-d') }}" required/>
			<x-form-input class="calc" id="until" name="until" type="date" label="Bis" required/>
			<div class="mt-3">
				<x-form-checkbox class="calc" id="electric" name="electric" label="Stromanschluß"/>
			</div>
			<x-form-input class="calc" type="number" step="1" min="1" id="persons" name="persons"
						  label="Anzahl Personen" required/>
			<x-form-input type="number" id="price" name="price" min="0" label="Gesamt-Preis" required/>
			<x-form-input type="hidden" id="prices" name="prices" required/>
			<div class="mt-2">
				<x-form-submit class="btn-sm btn-primary" icon="fas fa-save">Speichern</x-form-submit>
			</div>
		</x-form>
	</div>
@endsection

@push('inline-scripts')
	<script>
		const calcUrl = "{{ route('admin.guestBoatDates.price.calculate') }}";
		$(document).ready(() => {
			const frm = document.frm,
				options = {!! $guestBoatOptionsAutocomplete !!},
				bindings = {
					name: frm.name,
					length: frm.length,
					home_port: frm.home_port,
					email: frm.email,
				};
			MyForm.autocomplete(".autocomplete", frm.name, options, 'name', bindings);
			Prices.calculate(document.frm, calcUrl);
		});
	</script>
@endpush
