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
                            <h2>Inserir nou staff tècnic</h2>
                            <p> * Camps obligatoris </p>
                            <br>
                            <form class="forms-sample" method="POST" action="{{ route('backend.equips.tecnics.store') }}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @error('id_equip')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                @error('nom')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                @error('carrec')
                                    <div class='alert alert-danger' role='alert'>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Equip *:</label>
                                    <select id="id_equip" name="id_equip" class="form-control js-example-basic-single w-100">
                                        <option></option>
                                        @foreach ($equips as $equip)
                                            <option 
                                                value="{{ $equip->id }}"
                                                {{ old('id_equip') == $equip->id ? 'selected' : '' }}
                                            >
                                                {{ $equip->categoria }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nom i cognoms *:</label>
                                    <input name="nom" type="text" class="form-control @error('nom') is-invalid @enderror" id="exampleInputEmail3" placeholder="Nom i cognoms" value="{{ old('nom') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Càrrec *:</label>
                                    <select id="carrec" name="carrec" class="form-control js-example-basic-single w-100">
                                        <option value="Entrenador">Entrenador</option>
                                        <option value="Assistent de l'entrenador">Assistent d'entrenador</option>
                                        <option value="Delegat">Delegat</option>
                                    </select>
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