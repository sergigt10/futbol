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
                        <h2>Modificar història</h2>
                        <p> * Camps obligatoris </p>
                        <br>
                        <form class="forms-sample" method="post" action="{{ route('backend.histories.update', ['historia' => $historia->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @error('titol_esp')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('titol_cat')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('titol_eng')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('titol_fra')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('descripcio_esp')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('descripcio_cat')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('descripcio_eng')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('descripcio_fra')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('imatge1')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputEmail3">Any:</label>
                                <input name="any" type="text" class="form-control @error('any') is-invalid @enderror" id="exampleInputEmail3" placeholder="Any" value="{{ $historia->any }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Títol ESP *:</label>
                                <input name="titol_esp" type="text" class="form-control @error('titol_esp') is-invalid @enderror" id="exampleInputEmail3" placeholder="Títol ESP" value="{{ $historia->titol_esp }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Títol CAT *:</label>
                                <input name="titol_cat" type="text" class="form-control @error('titol_cat') is-invalid @enderror" id="exampleInputEmail3" placeholder="Títol CAT" value="{{ $historia->titol_cat }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Títol ENG *:</label>
                                <input name="titol_eng" type="text" class="form-control @error('titol_eng') is-invalid @enderror" id="exampleInputEmail3" placeholder="Títol ENG" value="{{ $historia->titol_eng }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Títol FRA *:</label>
                                <input name="titol_fra" type="text" class="form-control @error('titol_fra') is-invalid @enderror" id="exampleInputEmail3" placeholder="Títol FRA" value="{{ $historia->titol_fra }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Descripció ESP *:</label>
                                <input id="descripcio_esp" type="hidden" name="descripcio_esp" value="{{ $historia->descripcio_esp }}">
                                <trix-editor 
                                    class="form-control @error('descripcio_esp') is-invalid @enderror "
                                    input="descripcio_esp">
                                </trix-editor>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Descripció CAT *:</label>
                                <input id="descripcio_cat" type="hidden" name="descripcio_cat" value="{{ $historia->descripcio_cat }}">
                                <trix-editor 
                                    class="form-control @error('descripcio_cat') is-invalid @enderror "
                                    input="descripcio_cat">
                                </trix-editor>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Descripció ENG *:</label>
                                <input id="descripcio_eng" type="hidden" name="descripcio_eng" value="{{ $historia->descripcio_eng }}">
                                <trix-editor 
                                    class="form-control @error('descripcio_eng') is-invalid @enderror "
                                    input="descripcio_eng">
                                </trix-editor>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Descripció FRA *:</label>
                                <input id="descripcio_fra" type="hidden" name="descripcio_fra" value="{{ $historia->descripcio_fra }}">
                                <trix-editor 
                                    class="form-control @error('descripcio_fra') is-invalid @enderror "
                                    input="descripcio_fra">
                                </trix-editor>
                            </div>
                            <div class="row grid-margin">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 style="color:red">Pujar imatges en format: jpg, png o gif</h4>
                                            <br>
                                            <div class="form-row">
                                                <div class="form-group col-md-9">
                                                    <div class="form-group">
                                                        <label>Imatge història</label>
                                                        <input name="imatge1" type="file" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                            <input name="imatge1" type="text" class="form-control @error('imatge1') is-invalid @enderror file-upload-info" readonly="readonly" placeholder="Imatge" value="{{ old('imatge1') }}">
                                                            <span class="input-group-append">
                                                                <button class="file-upload-browse btn btn-primary" type="button">Cercar imatge</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="form-check form-check-danger" style="float:right;">
                                                        <img src='{{ asset("/storage/$historia->imatge1") }}' alt="UD Taradell" with=200 height=92>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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