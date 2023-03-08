<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equip;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function filtreIndex () {
        $equips = Equip::all();
        
    }

    public function index()
    {
        $jugadors = Jugador::all();

        return view('backend.equips.jugadors.index')
            ->with('jugadors', $jugadors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equips = Equip::all();

        return view('backend.equips.jugadors.create')
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
            'dorsal' => 'required',
            'posicio' => 'required'
        ]);/* Max foto 10 MB */

        $jugador = new Jugador($data);
        $jugador->save();

        // Redireccionar
        return redirect()->action('JugadorController@index')->with('estat', 'Jugador creat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function show(Jugador $jugador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function edit(Jugador $jugador)
    {
        $equips = Equip::all();

        return view('backend.equips.jugadors.edit', compact('jugador', 'equips'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jugador $jugador)
    {
        // Validació
        $data = $request->validate([
            'id_equip' => 'required',
            'nom' => 'required',
            'dorsal' => 'required',
            'posicio' => 'required'
        ]);
        
        // Asignar los valores
        $jugador->id_equip = $data['id_equip'];
        $jugador->nom = $data['nom'];
        $jugador->dorsal = $data['dorsal'];
        $jugador->posicio = $data['posicio'];

        $jugador->save();

        // Redireccionar
        return redirect()->action('JugadorController@index')->with('estat', 'Jugador modificat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jugador $jugador)
    {
        // Eliminar imatges
        if (File::exists(storage_path("app/public/$jugador->imatge"))) {
            File::delete(storage_path("app/public/$jugador->imatge"));
        }

        $jugador->delete();
        
        return redirect()->action('JugadorController@index');
    }
}
