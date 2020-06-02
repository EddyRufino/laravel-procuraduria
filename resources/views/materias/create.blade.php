@extends('admin.layout')

@section('content')
<div class="col-md-6">
	<div class="card shadow card-primary card-outline">
		<form action="{{ route('materias.store') }}" method="POST" class="form-horizontal">
			@csrf
			<div class="card-body">
				<div class="form-group">
					<label for="exampleInputEmail1">Materia:</label>
					<input type="text" name="nombreMateria"
							class="form-control shadow-sm @error('nombreMateria') is-invalid @else  @enderror"
							placeholder="Nombre de la materia" value="{{ old('nombreMateria') }}">
					@error('nombreMateria')
						<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			<div class="card-footer">
				<button type="submit" class="btn btn-primary btn-block">Registrar</button>
			</div>
		</form>
	</div>
</div>
@endsection