<table>
	@if($data->count() > 0)
		<thead>
		<tr>
			<th>Kennzeichen</th>
			<th>Länge</th>
			<th>Von</th>
			<th>Bis</th>
			<th>Tage</th>
			<th>Personen</th>
			<th>Strom</th>
			<th>Preis</th>
		</tr>
		</thead>
		<tbody>
		@foreach($data as $item)
			<tr>
				<td>{{ $item->caravan->carnumber }}</td>
				<td>{{ $item->caravan->carlength }}</td>
				<td>{{ $item->from->format('d.m.Y') }}</td>
				<td>{{ $item->until->format('d.m.Y') }}</td>
				<td>{{ $item->days }}</td>
				<td>{{ $item->persons }}</td>
				<td>{{ $item->electric }}</td>
				<td>{{ $item->price }}</td>
			</tr>
		@endforeach
		<tr>
			<td colspan="7" style="text-align:right">Summe Preis</td>
			<td><b style="color:#ff0000">{{ $priceTotal }}</b></td>
		</tr>
		</tbody>
	@else
		<thead>
		<tr>
			<th>Keine Daten vorhanden</th>
		</tr>
		</thead>
	@endif
</table>
