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
                        <h2>Modificar equips</h2>
                        <p> * Camps obligatoris </p>
                        <br>
                        <form class="forms-sample" method="post" action="{{ route('backend.equips.jugadors.update', ['jugador' => $jugador->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                            @error('dorsal')
                                <div class='alert alert-danger' role='alert'>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('posicio')
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
                                            {{ $jugador->id_equip == $equip->id ? 'selected' : '' }}
                                        >
                                            {{ $equip->categoria }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Nom i cognoms *:</label>
                                <input name="nom" type="text" class="form-control @error('nom') is-invalid @enderror" id="exampleInputEmail3" placeholder="Nom i cognoms" value="{{ $jugador->nom }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Dorsal *:</label>
                                <input name="dorsal" type="text" class="form-control @error('dorsal') is-invalid @enderror" id="exampleInputEmail3" placeholder="Dorsal" value="{{ $jugador->dorsal }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Posició *:</label>
                                <select id="posicio" name="posicio" class="form-control js-example-basic-single w-100">
                                    <option 
                                        value="Porter"
                                        {{ $jugador->posicio == 'Porter' ? 'selected' : '' }}
                                    >
                                        Porter
                                    </option>
                                    <option 
                                        value="Defense"
                                        {{ $jugador->posicio == 'Defense' ? 'selected' : '' }}
                                    >
                                        Defense
                                    </option>
                                    <option 
                                        value="Migcampista"
                                        {{ $jugador->posicio == 'Migcampista' ? 'selected' : '' }}
                                    >
                                        Migcampista
                                    </option>
                                    <option 
                                        value="Davanter"
                                        {{ $jugador->posicio == 'Davanter' ? 'selected' : '' }}
                                    >
                                        Davanter
                                    </option>
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