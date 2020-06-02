@extends('admin.layout')

@section('content')
<div class="card shadow card-primary card-outline">
    <div class="card-header border-0">
        <h5 class="position-absolute mt-2 text-secondary">Listado de pendientes</h5>
        <div class="row justify-content-end">
            <div class="form-group col-md-4">
                <form method="GET" action="{{ route('expedientes.buscarp') }}">
                        <div class="input-group">

                            <select class="form-control" name="selectp">
                                <option>Elige</option>
                                @foreach ($juzgados as $juzgado)
                                    <option value="{{ $juzgado->id }}"
                                        >
                                        {{ $juzgado->nombreJuzgado }}
                                    </option>
                                @endforeach
                            </select>


                            {{-- <input name="search" class="form-control" placeholder="Texto a buscar"> --}}
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>

                </form>
            </div>
        </div>
    </div>
    <div class="card-body overflow-auto">

    <ul class="list-group">

        @forelse ($pendientes as $expediente)

            <li class="list-group-item border-0 mb-3 shadow-sm">
                <a class="text-secondary d-flex justify-content-between align-items-center"
                    href="{{ route('expedientes.show', $expediente) }}"
                    >
                    <span class=" font-weight-bold">
                        {{ $expediente->numExpediente }}
                    </span>

                    <span>
                        {{ $expediente->juzgado->nombreJuzgado }}
                    </span>

                    <span class="text-black-50">
                        Plazo
                        {{ $expediente->proceso->plazo }} días
                    </span>

                    <span class="text-black-50"
                        >
                        {{ $expediente->created_at->diffForHumans() }}
                    </span>

                    <span class="text-black-50"
                        >
                        Audiencia
                        {{ $expediente->fechaAudiencia }}
                    </span>
                </a>
            </li>

        @empty
            <li class="list-group-item border-0 mb-3 shadow-sm">No hay nada para mostrar</li>
        @endforelse
        <div class="overflow-auto">
            {{-- {{ $pendientes->links() }} --}}
        </div>


        {{-- @foreach ($practicantes as $practicante)
            <p>{{$practicante->numExpediente}}</p>
        @endforeach --}}


    </ul>
    </div>
</div>
@endsection