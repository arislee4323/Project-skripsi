@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
    <form action="{{ $register_url }}" method="post">
        {{ csrf_field() }}

        {{-- Name field --}}
        <div class="input-group mb-3 btn-sm">
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   value="{{ old('name') }}" placeholder="{{ __('Nama Depan') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        {{-- Full Name Field --}}
        <div class="input-group mb-3 btn-sm">
            <input type="text" name="full_name" class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" value="{{ old('full_name') }}" placeholder="{{_('Nama Belakang') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('full_name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('full_name') }}</strong>
                </div>
                @endif
            </div>

            {{-- Username Field --}}
            <div class="input-group mb-3 btn-sm">
                <input type="text" name="username" class="form-control {{$errors->has('username') ? 'is-invalid' : '' }}" value="{{ old('username') }}"placeholder="{{_('Username')}}" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                    </div>     
            </div>
            @if($errors->has('username'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('username') }}</strong>
            </div>
            @endif
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3 btn-sm">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Tanggal Lahir Field --}}
        <div class="input-group mb-3 btn-sm">
            <input type="date" name="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" value="{{old('date') }}" onkeydown="return false;" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-calendar-alt {{ config('adminlte.classes_auth_icon', '') }}"></span>
            </div>
        </div>
        @if($errors->has('date'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('date') }}</strong>
        </div>
        @endif
    </div>

    {{-- Jenis Kelamin field --}}
    <div class="input-group mb-3 btn-sm">Gender :&nbsp&nbsp&nbsp
        <input type="radio" name="jenis_kelamin" value="Laki-Laki">&nbsp Laki-Laki &nbsp&nbsp
        <input type="radio" name="jenis_kelamin" value="Perempuan"> &nbsp Perempuan
   
        @if($errors->has('jenis_kelamin'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('jenis_kelamin') }}</strong>
        </div>
        @endif
    </div>

    {{-- Alamat field --}}
    <div class="input-group mb-3 btn-sm">
        <input type="text" name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : ''}}" value="{{ old('alamat') }}" placeholder="Alamat" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-address-card {{ config('adminlte.classes_auth_icon', '') }}">
                </span>
            </div>
        </div>
        @if($errors->has('alamat'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('alamat') }}</strong>
            </div>
            @endif
        </div>

        {{-- Nomor HP field --}}
        <div class="input-group mb-3 btn-sm">
            <input type="number" name="number" class="form-control {{$errors->has('number') ? 'is-invalid' : ''}}" value="{{ old('number') }}" placeholder="Nomor Telepon" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-mobile {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('number'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('number') }}</strong>
                </div>
                @endif
            </div>

        {{-- Password field --}}
        <div class="input-group mb-3 btn-sm">
            <input type="password" name="password"
                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('adminlte::adminlte.password') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3 btn-sm">
            <input type="password" name="password_confirmation"
                   class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
            @endif
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop
