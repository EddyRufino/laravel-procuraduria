@extends('admin.layout')

@section('content')
<main class="card card-primary card-outline shadow">
    <div class="card-body">
        <form action="{{ route('expedientes.store') }}" method="POST" class="form-horizontal">
            @csrf
            
            <div class="row justify-content-center">

                <div class="col-md-4">
                <div class="form-group">
                    <label>Expediente:</label>
                        <input type="text" name="numExpediente"
                                class="form-control shadow-sm @error('numExpediente') is-invalid @else  @enderror"
                                placeholder="Número de expediente" value="{{ old('numExpediente') }}">

                            @error('numExpediente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="col-md-2">
                <div class="form-group">
                    <label>N. Folios:</label>
                        <input type="number" name="folio"
                                class="form-control shadow-sm @error('folio') is-invalid @else  @enderror"
                                placeholder="Número de folios" value="{{ old('folio') }}">
                            @error('folio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-md-4">
                <div class="form-group">
                    <label >Materia:</label>
                        <select name="materia_id" id=""
                            class="form-control shadow-sm @error('materia_id') is-invalid @else  @enderror">
                            <option value="">Selecciona la materia</option>
                            @foreach ($materias as $materia)
                                <option value="{{ $materia->id }}">{{ $materia->nombreMateria }}</option>
                            @endforeach
                        </select>
                        @error('materia_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                    <label >Juzgado:</label>
                        <select name="juzgado_id"
                            class="form-control shadow-sm @error('juzgado_id') is-invalid @else  @enderror">
                            <option value="">Selecciona el juzgado</option>
                            @foreach ($juzgados as $juzgado)
                                <option value="{{ $juzgado->id }}">{{ $juzgado->nombreJuzgado }}</option>
                            @endforeach
                        </select>
                        @error('juzgado_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                    <label >Proceso:</label>
                        <select name="proceso_id"
                                class="form-control shadow-sm @error('proceso_id') is-invalid @else  @enderror">
                            <option value="">Selecciona el proceso</option>
                            @foreach ($procesos as $proceso)
                                <option value="{{ $proceso->id }}">{{ $proceso->nombreProceso }}</option>
                            @endforeach
                        </select>
                        @error('proceso_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            </div>

            <p class="text-center text-secondary mb-3">Partes involucradas</p>

            <div class="row">

                <div class="col-md-6">
                <div class="form-group">
                    <label>Especialista:</label>
                        <input type="text" name="especialistaLegal"
                            class="form-control shadow-sm @error('especialistaLegal') is-invalid @else  @enderror"
                            placeholder="Nombre especialista legal" value="{{ old('especialistaLegal') }}">
                        @error('especialistaLegal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label>Demandante:</label>
                        <input type="text" name="demandante"
                        class="form-control shadow-sm @error('demandante') is-invalid @else  @enderror"
                        placeholder="Nombre demandate" value="{{ old('demandante') }}">
                        @error('demandante')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-md-6">
                <div class="form-group">
                    <label>Demandado:</label>
                        <input type="text" name="demandado"
                        class="form-control shadow-sm @error('demandado') is-invalid @else  @enderror"
                        placeholder="Nombre demandado" value="{{ old('demandado') }}">
                        @error('demandado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label>Destinatario:</label>
                        <input type="text" name="destinatario"
                        class="form-control shadow-sm @error('destinatario') is-invalid @else  @enderror"
                        placeholder="Nombre destinatario" value="{{ old('destinatario') }}">
                        @error('destinatario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label>Dirección:</label>
                        <input type="text" name="direccion"
                        class="form-control shadow-sm @error('direccion') is-invalid @else  @enderror"
                        placeholder="Ingresa una dirección" value="{{ old('direccion') }}">
                        @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h6 class="mb-3 text-center text-secondary">Fechas a respetar</h6>

            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                    <label>Fecha Apertura:</label>
                    <div class="input-group date">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input name="fechaApertura"
                            value=""
                            type="text" class="form-control shadow-sm @error('fechaApertura') is-invalid @else  @enderror pull-right datepicker"
                            id="datepicker">
                            @error('fechaApertura')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label>Fecha Audiencia:</label>
                    <div class="input-group date">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input name="fechaAudiencia"
                            value=""
                            type="text" class="form-control shadow-sm @error('fechaAudiencia') is-invalid @else  @enderror pull-right datepicker"
                            id="datepicker2">
                        @error('fechaAudiencia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label>Acto:</label>
                <div class="col-md-9">
                    <input type="text" name="acto"
                            class="form-control shadow-sm @error('acto') is-invalid @else  @enderror"
                            placeholder="Nombre del acto" value="{{ old('acto') }}">
                        @error('acto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>

            <h6 class="text-secondary text-center m-4">Abogado a cargo</h6>

            <div class="row justify-content-center">

                <div class="form-group col-md-6">
                    <label>Abogado:</label>
                    <select name="user_id"
                        placeholder="Seleccione uno o más abogados"
                        class="form-control shadow-sm @error('user_id') is-invalid @else  @enderror">
                        <option value="">Selecciona el abogado</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- <div class="form-group col-md-6">
                    <label>Practicantes:</label>
                    <select name="user_id[]"
                        multiple="multiple"
                        placeholder="Seleccione uno o más abogados"
                        class="form-control select2 shadow-sm @error('user_id') is-invalid @else  @enderror">
                        <option value="">Selecciona los abogados</option>
                        @foreach ($practicantes as $practicante)
                            <option value="{{ $practicante->id }}">{{ $practicante->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}

                {{-- <div class="col-md-6 form-group {{ $errors->has('practicantes') ? 'has-error' : '' }}">
                    <div class="">
                        <label>Practicantes:</label>
                        <select name="practicantes[]"
                                class="form-control select2"
                                multiple="multiple"
                                data-placeholder="Selecciona uno o más practicantes"
                            >
                        @foreach ($practicantes as $practicante)
                            <option {{ collect(old('practicantes'))->contains($practicante->id) ? 'selected' : '' }} value="{{ $practicante->name }}">{{ $practicante->name }}</option>
                        @endforeach
                        </select>
                        {!! $errors->first('practicantes', '<span class="help-block">:message</span>') !!}
                    </div>
                </div> --}}
            </div>

            <div class="form-group text-center">
            	<button class="btn btn-primary center">Guardar</button>
                <a class="btn btn-secondary" href="#">Cancelar</a>
            </div>
            </div>
        </form>
</main>
@endsection

{{-- @push('styles')
  <link rel="stylesheet" href="/adminlte/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush --}}


{{-- @push('scripts')
    <script src="/adminlte/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
@endpush --}}

{{-- <script>
	$('#datepicker').datepicker({
      autoclose: true
    });

    $('.select2').select2({
      practicantes: true
    });
</script> --}}