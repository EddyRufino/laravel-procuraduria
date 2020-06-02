@extends('admin.layout')

@section('content')
<div class="card card-primary card-outline shadow">
	<div class="card-body">
		<div class="row justify-content-around">

			<div class="form-group">
				<label class="text-muted">Nombre de expediente:</label>
				<p class="form-control border-0">{{ $expediente->numExpediente }}</p>
			</div>

			<div class="form-group">
				<label class="text-muted">Número de folios:</label>
				<p class="form-control border-0">{{ $expediente->folio }}</p>
			</div>

		</div>

		<div class="row justify-content-around">
			
			<div class="form-group">
				<label class="text-muted">Nombre de la materia:</label>
				<p class="form-control border-0">{{ $expediente->materia->nombreMateria }}</p>
			</div>

			<div class="form-group">
				<label class="text-muted">Nombre del juzgado:</label>
				<p class="form-control border-0">{{ $expediente->juzgado->nombreJuzgado }}</p>
			</div>

			<div class="form-group">
				<label class="text-muted">Nombre del proceso:</label>
				<p class="form-control border-0">{{ $expediente->proceso->nombreProceso }}</p>
			</div>

		</div>

		<h6 class="text-secondary text-center m-4">Partes involucradas</h6>

		<div class="row justify-content-around">

			<div class="form-group">
				<label class="text-muted">Nombre del especialista:</label>
				<p class="form-control border-0">{{ $expediente->especialistaLegal }}</p>
			</div>
	
			<div class="form-group">
				<label class="text-muted">Nombre del demandante:</label>
				<p class="form-control border-0">{{ $expediente->demandante }}</p>
			</div>

		</div>

		<div class="row justify-content-around">

			<div class="form-group">
				<label class="text-muted">Nombre del demandado:</label>
				<p class="form-control border-0">{{ $expediente->demandado }}</p>
			</div>

			<div class="form-group">
				<label class="text-muted">Nombre del destinatario:</label>
				<p class="form-control border-0">{{ $expediente->destinatario }}</p>
			</div>

			<div class="form-group">
				<label class="text-muted">Nombre del direccion:</label>
				<p class="form-control border-0">{{ $expediente->direccion }}</p>
			</div>

		</div>

		<h6 class="text-secondary text-center m-4">Fechas a respetar</h6>

		<div class="row justify-content-around">
			
			<div class="form-group">
				<label class="text-muted">Fecha de apertura:</label>
				<p class="form-control border-0">{{ $expediente->fechaApertura }}</p>
			</div>
	
			<div class="form-group">
				<label class="text-muted">Fecha de audiencia:</label>
				<p class="form-control border-0">{{ $expediente->fechaAudiencia }}</p>
			</div>

		</div>

		<h6 class="text-secondary text-center m-4">Personas encargadas</h6>

		<div class="row justify-content-around">

			{{-- <div class="form-group">
				<label class="text-muted">Abogado asignado:</label>
				<p class="form-control border-0">
					{{ !empty($expediente->users->name) ? $expediente->users->name : '' }}
				</p>
			</div> --}}

			<div class="form-group">
				{{-- <label class="text-muted">Practicantes:</label> --}}
					<p>{{ $expediente->users()->pluck('name')->implode(', ') }}</p>
			</div>

		</div>

		<div class="row justify-content-center">

			@if (auth()->user()->hasRoles(['admin', 'abogado']))
				<div class="form-group">
					<a class="btn btn-primary" href="{{ route('expedientes.edit', $expediente->id) }}">Asignar expediente</a>
				</div>
			@endif

		</div>

		</div>
	</div>
@endsection
