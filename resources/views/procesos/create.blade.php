@extends('admin.layout')

@section('content')
<div class="col-md-6">
	<div class="card shadow card-primary card-outline">
		<form action="{{ route('procesos.store') }}" method="POST" class="form-horizontal">
			@csrf
			<div class="card-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Proceso:</label>
					<input type="text" name="nombreProceso"
							class="form-control shadow-sm @error('nombreProceso') is-invalid @else  @enderror"
							placeholder="Nombre del proceso" value="{{ old('nombreProceso') }}">

							@error('nombreProceso')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror

				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Plazo:</label>
					<input type="number" name="plazo"
							class="form-control shadow-sm @error('plazo') is-invalid @else  @enderror"
							placeholder="Cantidad de días" value="{{ old('plazo') }}">

							@error('plazo')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
							@enderror

				</div>

			<div class="card-footer">
				<button type="submit" class="btn btn-primary btn-block">Registrar</button>
			</div>
		</form>
	</div>
</div>
</div>
@endsection