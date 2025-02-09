@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Nuevo Usuario</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li>
                        <li class="breadcrumb-item active">Nuevo Registro</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-">Nuevo Registro</h4>
                </div>
            </div>
            <div class="card-body">
                <form class="row gy-1" method="POST" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
                    <div class="col-xxl-3 col-md-6">
                        <div>
                            <label for="nombres" class="form-label">{{ __('Nombres') }}</label>
                            <input type="text" class="form-control" @error('nombres') is-invalid @enderror id="nombres" name="nombres" value="{{  old('nombres') }}" required autofocus>
                            @error('nombres')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
