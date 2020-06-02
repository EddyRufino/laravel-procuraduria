@extends('admin.layout')

@section('content')
<div class="card shadow card-primary card-outline">
<div class="card-body">
    <form method="POST" action="{{ route('expedientes.update', $expediente) }}"  class="form-horizontal">
    @csrf @method('PUT')

        <div class="row">

            @if (auth()->user()->hasRoles(['admin']))
                <div class="form-group col-md-6">
                    <label>Abogados:</label>
                        <select name="user_id[]"
                            multiple="multiple"
                            data-placeholder="Selecciona uno o más abogados"
                            class="form-control select2 shadow-sm @error('user_id') is-invalid @else  @enderror">
                            <option value="">Selecciona el abogado</option>
                            @foreach ($users as $user)
                                    <option {{ collect(old('tags', $expediente->users->pluck('id')))->contains($user->id) ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            @endif

            <div class="form-group col-md-6 {{ $errors->has('tags') ? 'has-error' : '' }}">
                <label>Practicantes:</label>
                <select name="user_id[]" class="form-control select2"
                        multiple="multiple"
                        data-placeholder="Selecciona uno o más practicantes"
                        style="width: 100%;">
                  @foreach ($tags as $tag)
                            <option {{ collect(old('tags', $expediente->users->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
                </select>
                {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
              </div>

            
            {{-- <div class="col-md-6 form-group {{ $errors->has('practicantes') ? 'has-error' : '' }}">
                <label>Practicantes:</label>
                <select name="practicantes[]"
                        class="form-control select2"
                        multiple="multiple"
                        data-placeholder="Selecciona uno o más practicantes"
                    >
                @foreach ($practicantes as $practicante)
                    <option {{ old('practicantes', $user->id) == $practicante->id ? 'selected' : '' }} value="{{ $practicante->id }}">{{ $practicante->name }}</option>
                @endforeach
                </select>
                {!! $errors->first('practicantes', '<span class="help-block">:message</span>') !!}
            </div> --}}

        </div>


        <div class="form-group d-none">
            <label class="col-md-3 form-control-label" for="text-input">Expediente:</label>
            <div class="col-md-9">
                <input type="text" name="numExpediente"
                        class=" form-control shadow-sm @error('numExpediente') is-invalid @else  @enderror"
                        placeholder="Número de expediente"
                        value="{{ old('numExpediente', $expediente->numExpediente) }}">
                    @error('numExpediente')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>

        <div class="form-group d-none">
            <label class="d-none col-md-3 form-control-label" for="text-input">N. Folios:</label>
            <div class="col-md-9">
                <input type="number" name="folio"
                        class="d-none form-control shadow-sm @error('folio') is-invalid @else  @enderror"
                        placeholder="Número de expediente"
                        value="{{ old('folio', $expediente->folio) }}">
                    @error('folio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>

        <div class="form-group d-none">
            <label class="d-none col-md-3 form-control-label" for="email-input">Materia:</label>
            <div class="col-md-9">
                <select name="materia_id" id=""
                    class="d-none form-control shadow-sm @error('materia_id') is-invalid @else  @enderror">
                    <option value="">Selecciona la materia</option>
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->id }}"
                            {{ old('materia_id', $expediente->materia_id) == $materia->id ? 'selected' : '' }}
                            >
                            {{ $materia->nombreMateria }}
                        </option>
                    @endforeach
                </select>
                @error('materia_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group d-none">
            <label class="d-none col-md-3 form-control-label" for="email-input">Juzgado:</label>
            <div class="col-md-9">
                <select name="juzgado_id"
                    class="d-none form-control shadow-sm @error('juzgado_id') is-invalid @else  @enderror">
                    <option value="">Selecciona el juzgado</option>
                    @foreach ($juzgados as $juzgado)
                        <option value="{{ $juzgado->id }}"
                            {{ old('juzgado_id', $expediente->juzgado_id) == $juzgado->id ? 'selected' : '' }}
                            >
                            {{ $juzgado->nombreJuzgado }}
                        </option>
                    @endforeach
                </select>
                @error('juzgado_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group d-none">
            <label class="d-none col-md-3 form-control-label" for="email-input">Especialista:</label>
            <div class="col-md-9">
                <input type="text" name="especialistaLegal"
                    class="d-none form-control shadow-sm @error('especialistaLegal') is-invalid @else  @enderror"
                    placeholder="Nombre especialista legal"
                    value="{{ old('especialistaLegal', $expediente->especialistaLegal) }}">
                @error('especialistaLegal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group d-none">
            <label class="d-none col-md-3 form-control-label" for="email-input">Demandante:</label>
            <div class="col-md-9">
                <input type="text" name="demandante"
                class="d-none form-control shadow-sm @error('demandante') is-invalid @else  @enderror"
                placeholder="Nombre demandate"
                value="{{ old('demandante', $expediente->demandante) }}">
                @error('demandante')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group d-none">
            <label class="d-none col-md-3 form-control-label" for="email-input">Demandado:</label>
            <div class="col-md-9">
                <input type="text" name="demandado"
                class="d-none form-control shadow-sm @error('demandado') is-invalid @else  @enderror"
                placeholder="Nombre demandado"
                value="{{ old('demandado', $expediente->demandado) }}">
                @error('demandado')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group d-none">
            <label class="d-none col-md-3 form-control-label" for="email-input">Destinatario:</label>
            <div class="col-md-9">
                <input type="text" name="destinatario"
                class="d-none form-control shadow-sm @error('destinatario') is-invalid @else  @enderror"
                placeholder="Nombre destinatario"
                value="{{ old('destinatario', $expediente->destinatario) }}">
                @error('destinatario')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group d-none">
            <label class="d-none col-md-3 form-control-label" for="email-input">Dirección:</label>
            <div class="col-md-9">
                <input type="text" name="direccion"
                class="d-none form-control shadow-sm @error('direccion') is-invalid @else  @enderror"
                placeholder="Ingresa una dirección"
                value="{{ old('direccion', $expediente->direccion) }}">
                @error('direccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group d-none">
            <label class="d-none col-md-3 form-control-label" for="email-input">Fecha Apertura:</label>
            <div class="col-md-9">
                <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input name="fechaApertura"
                    value="{{ old('fechaApertura', $expediente->fechaApertura ? $expediente->fechaApertura : null) }}"
                    type="text" class="d-none form-control shadow-sm @error('fechaApertura') is-invalid @else  @enderror pull-right datepicker"
                    id="datepicker">
                    @error('fechaApertura')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group d-none">
            <label class="d-none col-md-3 form-control-label" for="email-input">Proceso:</label>
            <div class="col-md-9">
                <select name="proceso_id"
                        class="d-none form-control shadow-sm @error('proceso_id') is-invalid @else  @enderror">
                    <option value="">Selecciona el proceso</option>
                    @foreach ($procesos as $proceso)
                        <option value="{{ $proceso->id }}"
                            {{ old('proceso_id', $expediente->proceso_id) == $proceso->id ? 'selected' : '' }}
                            >
                            {{ $proceso->nombreProceso }}
                        </option>
                    @endforeach
                </select>
                @error('proceso_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group d-none">
            <label class="d-none col-md-3 form-control-label" for="text-input">Acto:</label>
            <div class="col-md-9">
                <input type="text" name="acto"
                        class="d-none form-control shadow-sm @error('acto') is-invalid @else  @enderror"
                        placeholder="Número de expediente"
                        value="{{ old('acto', $expediente->acto) }}">
                    @error('acto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>

        <div class="form-group d-none">
            <label class="d-none col-md-3 form-control-label" for="email-input">Fecha Audiencia:</label>
            <div class="col-md-9">
                <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input name="fechaAudiencia"
                    value="{{ old('fechaAudiencia', $expediente->fechaAudiencia ? $expediente->fechaAudiencia : null) }}"
                    type="text" class="d-none form-control shadow-sm @error('fechaAudiencia') is-invalid @else  @enderror pull-right datepicker"
                    id="datepicker2">
                @error('fechaAudiencia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
        </div>


        <div class="form-group d-none">
            <label class=" d-none col-md-3 form-control-label" for="text-input">Acto:</label>
            <div class="col-md-9">
                <input type="text" name="condition"
                        class="d-none form-control shadow-sm @error('condition') is-invalid @else  @enderror"
                        placeholder="Número de expediente"
                        value="{{ old('condition', $expediente->condition) }}">
                    @error('condition')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>



        <div class="form-group text-center">
            <button class="btn btn-primary center">Guardar</button>
            <a class="btn btn-secondary" href="#">Cancelar</a>
        </div>
    </form>
</div>
</div>
@endsection

@push('styles')
  {{-- <link rel="stylesheet" href="/adminlte/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> --}}
    {{-- <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" /> --}}
    {{-- <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> --}}
@endpush


@push('scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> --}}
    {{-- <script src="/adminlte/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> --}}
    {{-- <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script> --}}
@endpush

<script>
	// $('#datepicker').datepicker({
    //   autoclose: true
    // });

    // $('.select2').select2({
    //     tags: true
    // });
</script>