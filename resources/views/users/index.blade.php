@extends('admin.layout')

@section('content')
	<main class="main">
		<div class="container-fluid">
			<div class="card shadow card-primary card-outline">
				<div class="card-header border-0 d-flex justify-content-around">
					<h4 class="text-secondary">Lista de usuarios</h4>
							<a class="btn btn-primary" href="{{ route('usuarios.create') }}">Nuevo</a>
        </div>
        <div class="card-body overflow-auto">
					<table class="table table-striped table-sm">
				        <thead>
				            <tr>
				                {{-- <th>Opciones</th> --}}
				                <th>Nombre</th>
				                <th>Email</th>
				                <th>Role</th>
				                <th>Estado</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach ($users as $user)
				                <tr>
				                    {{-- <td>
				                        <button type="button" class="btn btn-warning btn-sm">
				                          <i class="icon-pencil">
				                          </i>
				                        </button> &nbsp;
				                        <button type="button" class="btn btn-danger btn-sm">
				                          <i class="icon-trash"></i>
				                        </button>
				                    </td> --}}
				                    <td>{{ $user->name }}</td>
				                    <td>{{ $user->email }}</td>
				                    <td>{{ $user->roles->pluck('display_name')->implode(' - ') }}</td>
				                    <td>
			                            <div class="d-flex">
			                                <a  class="btn btn-success"
			                                    href="{{ route('usuarios.edit', $user->id) }}"
			                                    >Editar
			                                </a>&nbsp;
			                                <form action="{{ route('usuarios.destroy', $user->id) }}"
			                                    method="post">
			                                    @csrf @method('DELETE')
			                                    <button class="btn btn-danger">Eliminar</button>
			                                </form>
			                            </div>
			                        </td>
				                </tr>
				            @endforeach
				        </tbody>
				    </table>
		    		<div class="overflow-auto">
                    	{{ $users->links() }}
                	</div>
                </div>
			</div>
{{-- 			<div class="d-flex justift-content-center align-items-center  justify-content-around">
	            <h1 class=" text-primary">Lista de usuarios</h1>
	            <a class="btn btn-primary pull-right d-block" href="{{ route('usuarios.create') }}">Nuevo</a>
	        </div> --}}

	    </div>
	</main>
@endsection