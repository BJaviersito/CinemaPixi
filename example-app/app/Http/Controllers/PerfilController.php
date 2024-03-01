<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

/**
 * Class PerfilController
 * @package App\Http\Controllers
 */
class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfils = Perfil::paginate();

        return view('perfil.index', compact('perfils'))
            ->with('i', (request()->input('page', 1) - 1) * $perfils->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfil = new Perfil();
        return view('perfil.create', compact('perfil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
            // Agrega más reglas de validación según sea necesario para otros campos
        ]);

        $input = $request->all();

        // Manejo de la imagen
        if ($image = $request->file('imagen')) {
            $destinationPath = 'image_path'; // Ruta donde deseas almacenar las imágenes
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imagen'] = $profileImage;
        }

        Perfil::create($input);

        return redirect()->route('perfil.index')
            ->with('success', 'Perfil created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perfil = Perfil::find($id);

        return view('perfil.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil = Perfil::find($id);

        return view('perfil.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Perfil $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        $request->validate([
            'nombre' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
            // Agrega más reglas de validación según sea necesario para otros campos
        ]);

        $input = $request->all();

        // Manejo de la imagen
        if ($image = $request->file('imagen')) {
            $destinationPath = 'image_path'; // Ruta donde deseas almacenar las imágenes
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imagen'] = $profileImage;
        } else {
            unset($input['imagen']); // Elimina el campo de imagen si no se ha proporcionado una nueva imagen
        }

        $perfil->update($input);

        return redirect()->route('perfil.index')
            ->with('success', 'Perfil updated successfully');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $perfil = Perfil::find($id)->delete();

        return redirect()->route('perfil.index')
            ->with('success', 'Perfil deleted successfully');
    }
}
