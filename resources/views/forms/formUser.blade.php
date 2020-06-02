{{-- <div class="form-group">
    <p>
        <label for="avatar">
            <input type="file" name="avatar">
            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </label>
    </p>
</div> --}}

<div class="form-group">
    <label for="name">Nombre</label>
    <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror"
            name="name"
            id="name"
            placeholder="Nombre..."
            value="{{ old('name', $user->name) }}">

    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror"
            type="email"
            name="email"
            id="email"
            placeholder="Email..."
            value="{{ old('email', $user->email) }}">

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- @unless ($user->id)



@endunless --}}

@auth
    @if (auth()->user()->hasRoles(['admin']))
        <div class="form-group checkbox">
            @foreach ($roles as $id => $name)
                <label>
                    <input type="checkbox"
                        value="{{ $id }}"
                        {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
                        name="roles[]">
                    {{ $name }}
                </label>
            @endforeach
        </div>
    @endif
@endauth


    {{-- @error('roles')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror --}}

{{-- {!! $errors->first('roles', '<span class="error">:message</span>') !!} --}}
<hr>
