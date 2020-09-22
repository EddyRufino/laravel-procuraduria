@extends('admin.layout')

@section('content')

<div class="card shadow card-primary card-outline">  
    <div class="row pt-3">
        <div class="col-md-3">
            <a class="d-flex justify-content-around" href="{{ route('pendientes.index') }}">
                <h4 class="text-center">Total de casos</h4>
                <h4 class="">{{ $pendientes->count() }}</h4>
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h3 class="ml-4 card-header text-secondary">Expedientes por vencer</h3>

                @forelse ($pendientesPorVencer as $pendiente)
                    <a style="color: white"
                        class="ml-4 mt-1 btn bg-gradient-warning"
                        href="{{ route('expedientes.show', $pendiente->id) }}"
                    >
                        {{ $pendiente->numExpediente }}&nbsp;&nbsp;&nbsp;
                        Fecha Audiencia:&nbsp;
                        {{ $pendiente->fechaAudiencia }}
                    </a><br>
                @empty
                    <p class="ml-4">No hay casos por vencer</li>
                @endforelse

            </div>

            <div class="col-md-6">
                <h3 class="ml-4 mr-4 text-secondary card-header">Expedientes vencidos</h3>

                @forelse ($pendientesVencidos as $pendiente)
                    <div class="d-flex align-items-center">
                        
                    
                    <a class="ml-4 mt-1 btn bg-danger"
                        href="{{ route('expedientes.show', $pendiente->id) }}"
                    >
                        {{ $pendiente->numExpediente }}
                        &nbsp;&nbsp;&nbsp;
                        Fecha Audiencia:&nbsp;
                        {{ $pendiente->fechaAudiencia }}
                        


                    </a><br>
                {{-- onclick="document.getElementById('delete-message').submit()" --}}
                    <a href="#" >
                        <delete-expediente
                            expediente-id="{{ $pendiente->id }}"
                            >
                        </delete-expediente>
                    </a>

{{--                         <form class="d-none"
                            id="delete-message"
                            action="{{ route('expedientes.destroy', $pendiente->id) }}"
                            method="post"
                        >
                                @csrf @method('DELETE')
                        </form> --}}
                    </div>

                @empty
                    <p class="card-header ml-4">No hay casos por vencer</li>
                @endforelse

            </div>
            
        </div>
    </div>

</div>
@endsection