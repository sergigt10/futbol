@extends('backend.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha512-494Ejp/5WyoRNfh+nPLhSCQPHhcsbA5PoIGv2/FuEo+QLfW+L7JQGPdh8Qy2ZOmkF27pyYlALrxteMiKau1tyw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('backend/vendors/css/vendor.bundle.addons.css') }}">
@endsection

@section('content')

    <div class="main-panel">        
        <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2>Modificar partit</h2>
                        <p> * Camps obligatoris </p>
                        <br>
                        <form class="forms-sample" method="post" action="{{ route('backend.partits.update', ['partit' => $partit->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @error('id_categoria')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('local')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('visitant')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('hora')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('marcador_local')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('marcador_visitant')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputEmail3">Categoria *:</label>
                                <input name="titol_esp" type="text" class="form-control @error('id_categoria') is-invalid @enderror" id="exampleInputEmail3" placeholder="Categoria" value="{{ $partit->id_categoria }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Local *:</label>
                                <input name="local" type="text" class="form-control @error('local') is-invalid @enderror" id="exampleInputEmail3" placeholder="Local" value="{{ $partit->local }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Visitant *:</label>
                                <input name="visitant" type="text" class="form-control @error('visitant') is-invalid @enderror" id="exampleInputEmail3" placeholder="Visitant" value="{{ $partit->visitant }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Hora *:</label>
                                <input name="hora" type="text" class="form-control @error('hora') is-invalid @enderror" id="exampleInputEmail3" placeholder="Hora" value="{{ $partit->hora }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Marcador local:</label>
                                <input name="marcador_local" type="text" class="form-control @error('marcador_local') is-invalid @enderror" id="exampleInputEmail3" placeholder="Marcador local" value="{{ $partit->marcador_local }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Marcador visitant:</label>
                                <input name="marcador_visitant" type="text" class="form-control @error('marcador_visitant') is-invalid @enderror" id="exampleInputEmail3" placeholder="Marcador visitant" value="{{ $partit->marcador_visitant }}">
                            </div>
                            <button type="submit" name="funcioBoto" class="btn btn-primary mr-2" value="Guardar">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha512-wEfICgx3CX6pCmTy6go+PmYVKDdi4KHhKKz5Xx/boKOZOtG7+rrm2fP7RUR2o4m/EbPdwbKWnP05dvj4uzoclA==" crossorigin="anonymous" defer></script>
    <script src="{{ asset('backend/js/file-upload.js') }}"></script>
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/js/select2.js') }}"></script>
@endsection

@endsection