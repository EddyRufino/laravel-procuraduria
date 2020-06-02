@extends('admin.layout')

@section('content')
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="container-fluid">
            <!-- Ejemplo de tabla Listado -->
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Categorías
                    <button type="button"  class="btn btn-secondary">
                        <a href="{{ route('expedientes.create') }}"><i class="icon-plus"></i>&nbsp;Nuevo</a>
                    </button>
                </div>
                <div class="card-body overflow-auto">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <select class="form-control col-md-3" id="opcion" name="opcion">
                                  <option value="nombre">Nombre</option>
                                  <option value="descripcion">Descripción</option>
                                </select>
                                <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </div>

                    <ul class="list-group">

                    @forelse ($pendientes as $pendiente)
                        <li class="list-group-item border-0 mb-3 shadow-sm">
                            <a class="text-secondary d-flex justify-content-between align-items-center"
                                href="{{ route('expedientes.pendientes', $pendiente) }}"
                                >
                                <span class=" font-weight-bold"
                                    >
                                    {{ $pendiente->numExpediente }}
                                </span>
                                {{-- <span class="text-black-50"
                                    > Tienes
                                    {{ $pendiente->proceso->plazo }} días
                                </span> --}}
                                <span class="text-black-50"
                                    >
                                    Audiencia
                                    {{ $pendiente->fechaAudiencia }}
                                </span>
                            </a>
                        </li>

                    @empty
                        <li class="list-group-item border-0 mb-3 shadow-sm">No hay nada para mostrar</li>
                    @endforelse
                    <div class="overflow-auto">
                        {{ $pendientes->links() }}
                    </div>
                </div>
            </div>
            <!-- Fin ejemplo de tabla Listado -->
        </div>
    </main>
@endsection