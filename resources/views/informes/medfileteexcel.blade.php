<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>SectionCod</th>
			<th>Barcode</th>
			<th>Centro</th>
			<th>Jaula</th>
			<th>Color Entero</th>
			<th>Color Lomo</th>
			<th>Color Belly</th>
			<th>Color NCQ</th>
			<th>Longitud Filete</th>
			<th>Area Filete</th>
			<th>Area Gaping</th>
			<th>Puntos Gaping</th>
			<th>Area Melanosis</th>
			<th>Puntos Melanosis</th>
			<th>Area Hematomas</th>
			<th>Puntos Hematomas</th>
		</tr>
	</thead>
	<tbody>
		@for ($i = 0 ; $i < 1000 ; $i++)
		<tr>
			<td>{{ $medicion[$i]->id }}</td>
			<td>{{ $medicion[$i]->sectionCod }}</td>
			<td>{{ $medicion[$i]->barCode }}</td>
			<td>{{ $medicion[$i]->centro }}</td>
			<td>{{ $medicion[$i]->jaula }}</td>
			<td>{{ $medicion[$i]->colorEntero }}</td>
			<td>{{ $medicion[$i]->colorLomo }}</td>
			<td>{{ $medicion[$i]->colorBelly }}</td>
			<td>{{ $medicion[$i]->colorNCQ }}</td>
			<td>{{ $medicion[$i]->longFilete }}</td>
			<td>{{ $medicion[$i]->areaFilete }}</td>
			<td>{{ $medicion[$i]->areaGap }}</td>
			<td>{{ $medicion[$i]->ptosGap }}</td>
			<td>{{ $medicion[$i]->areaMel }}</td>
			<td>{{ $medicion[$i]->ptosMel }}</td>
			<td>{{ $medicion[$i]->areaHem }}</td>
			<td>{{ $medicion[$i]->puntosHem }}</td>
		</tr>
		@endfor
	</tbody>
</table>