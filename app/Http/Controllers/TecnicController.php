<?php

namespace App\Http\Controllers;

use App\Models\Tecnic;
use App\Models\Equip;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class TecnicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id_equip)
    {
        $tecnics = tecnic::where('id_equip','=', $id_equip)->get();

        return view('backend.equips.tecnics.index')
            ->with('tecnics', $tecnics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equips = Equip::all();

        return view('backend.equips.tecnics.create')
            ->with('equips', $equips);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_equip' => 'required',
            'nom' => 'required',
            'carrec' => 'required'
        ]);/* Max foto 10 MB */

        $tecnic = new Tecnic($data);
        $tecnic->save();

        // Redireccionar
        return redirect()->action('EquipController@show')->with('estat', 'Tècnic creat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tecnic  $tecnic
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnic $tecnic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tecnic  $tecnic
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnic $tecnic)
    {
        $equips = Equip::all();

        return view('backend.equips.tecnics.edit', compact('tecnic', 'equips'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tecnic  $tecnic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tecnic $tecnic)
    {
        // Validació
        $data = $request->validate([
            'id_equip' => 'required',
            'nom' => 'required',
            'carrec' => 'required'
        ]);
        
        // Asignar los valores
        $tecnic->id_equip = $data['id_equip'];
        $tecnic->nom = $data['nom'];
        $tecnic->carrec = $data['dorsal'];

        $tecnic->save();

        // Redireccionar
        return redirect()->action('EquipController@show')->with('estat', 'Tècnic modificat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tecnic  $tecnic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnic $tecnic)
    {
        // Eliminar imatges
        if (File::exists(storage_path("app/public/$tecnic->imatge"))) {
            File::delete(storage_path("app/public/$tecnic->imatge"));
        }

        $tecnic->delete();
        
        return redirect()->action('EquipController@show');
    }
}
