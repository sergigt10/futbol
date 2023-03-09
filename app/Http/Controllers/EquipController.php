<?php

namespace App\Http\Controllers;

use App\Models\Equip;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EquipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equips = Equip::all();

        return view('backend.equips.index')
            ->with('equips', $equips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.equips.create');
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
            'categoria' => 'required',
            'link_resultats' => 'nullable',
            'link_classificacio' => 'nullable',
            'imatge' => 'nullable|image|max:10240|mimes:jpeg,png,jpg,gif,svg'
        ]);/* Max foto 10 MB */

        $ruta_imatge = $request['imatge']->store('backend/equips', 'public');

        $imatge = Image::make( storage_path("app/public/{$ruta_imatge}") )->fit(972, 570, function($constraint){$constraint->aspectRatio();});
        $imatge->save();

        $equip = new Equip($data);
        $equip->slug = Str::of($request['categoria'])->slug("-");
        $equip->imatge = $ruta_imatge;
        $equip->save();

        // Redireccionar
        return redirect()->action('EquipController@index')->with('estat', 'Equip creat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $equips = Equip::all();

        return view('backend.equips.show')
            ->with('equips', $equips);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function edit(Equip $equip)
    {
        return view('backend.equips.edit', compact('equip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equip $equip)
    {
        // Validació
        $data = $request->validate([
            'categoria' => 'required',
            'link_resultats' => 'nullable',
            'link_classificacio' => 'nullable'
        ]);
        
        // Si canviem el nom actualitzem slug
        if($equip->categoria !== $data['categoria']) {
            $equip->slug = Str::of($request['categoria'])->slug("-");
        }
        // Asignar los valores
        $equip->categoria = $data['categoria'];
        $equip->link_resultats = $data['link_resultats'];
        $equip->link_classificacio = $data['link_classificacio'];

        // Si el usuario sube una nueva imagen
        if($request['imatge']) {

            $ruta_imatge = $request['imatge']->store('backend/equips', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_imatge}") )->fit(972, 570, function($constraint){$constraint->aspectRatio();});
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$equip->imatge"))) {
                File::delete(storage_path("app/public/$equip->imatge"));
                // Asignar al objeto
                $equip->imatge = $ruta_imatge;
            }  
        }

        $equip->save();

        // Redireccionar
        return redirect()->action('EquipController@index')->with('estat', 'Equip modificat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equip $equip)
    {
        // Eliminar imatges
        if (File::exists(storage_path("app/public/$equip->imatge"))) {
            File::delete(storage_path("app/public/$equip->imatge"));
        }

        $equip->delete();
        
        return redirect()->action('EquipController@index');
    }
}
