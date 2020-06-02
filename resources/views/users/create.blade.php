@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                {{-- @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                @endif --}}
                    <form class="card-primary card-outline bg-white shadow rounded py-3 px-4"
                            enctype="multipart/form-data"
                            action="{{ route('usuarios.store') }}" method="post">
                            @csrf
                        {{-- <h4 class="text-secondary">Crear usuario</h4> --}}

                        @include('forms.formUser')

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control bg-light shadow-sm @error('password') is-invalid @else border-0 @enderror"
                                        type="password"
                                        name="password"
                                        id="password"
                                        placeholder="Nombre..."
                                        value="{{ old('password', $user->password) }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Password Confirm</label>
                                <input class="form-control bg-light shadow-sm @error('password_confirmation') is-invalid @else border-0 @enderror"
                                        type="password"
                                        name="password_confirmation"
                                        id="password_confirmation"
                                        placeholder="Nombre..."
                                        value="{{ old('password', $user->password) }}">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                        <button class="btn btn-primary btn-lg btn-block">Crear</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
