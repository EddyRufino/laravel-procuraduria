@extends('admin.layout')

@section('content')
    <div class="card shadow card-primary card-outline">

        <div class="card-header border-0">
            <h5 class="position-absolute mt-2 text-secondary">Listado de expedientes</h5>
            <div class="row justify-content-end">
                <div class="form-group col-md-8">
                    <form method="GET" action="{{ route('expedientes.search') }}">
                        <div class="row">
                            <div class="input-group col-md-6">
                                <input class="form-control" name="nameExpe" type="text" placeholder="Busca un expediente">
                            </div>
                            <div class="input-group col-md-6">
                                <select class="form-control col-md-10" name="select">
                                    <option>Elige Juzgado</option>
                                    @foreach ($juzgados as $juzgado)
                                        <option value="{{ $juzgado->id }}">
                                            {{ $juzgado->nombreJuzgado }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body overflow-auto">

            <ul class="list-group">

            @forelse ($expedientes as $expediente)
                <li class="list-group-item border-0 mb-3 shadow-sm">
                    <a class="text-secondary d-flex justify-content-between align-items-center"
                        href="{{ route('expedientes.show', $expediente) }}"
                        >
                        
                        <span class=" font-weight-bold">
                            {{ $expediente->numExpediente }}
                        </span>

                        <span class=" font-weight-bold">
                            {{ $expediente->juzgado->nombreJuzgado }}
                        </span>

                        {{-- @if ($expediente->has('users')) --}}
                            <span class="text-black-50"
                                > Asignado a :
                                {{ !empty($expediente->users->pluck('name')->implode(', ')) ? $expediente->users->pluck('name')->implode(', ') : '' }}
                            </span>
                        {{-- @endif --}}

                        <span class="text-black-50">
                            Plazo {{ $expediente->proceso->plazo }} días
                        </span>

                        <span class="text-black-50">
                            {{ $expediente->created_at->diffForHumans() }}
                        </span>

                        <span class="text-black-50">
                            Audiencia {{ $expediente->fechaAudiencia }}
                        </span>
                    </a>
                </li>

            @empty
                <li class="list-group-item border-0 mb-3 shadow-sm">No hay nada para mostrar</li>
            @endforelse
            <div class="overflow-auto row justify-content-center">
                {{ $expedientes->links() }}
            </div>
        </div>
    </div>
            <!-- Fin ejemplo de tabla Listado -->
@endsection