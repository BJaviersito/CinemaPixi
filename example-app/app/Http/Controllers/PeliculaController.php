<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

/**
 * Class PeliculaController
 * @package App\Http\Controllers
 */
class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::paginate();

        return view('pelicula.index', compact('peliculas'))
            ->with('i', (request()->input('page', 1) - 1) * $peliculas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelicula = new Pelicula();
        return view('pelicula.create', compact('pelicula'));
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
            'Titulo_peli' => 'required',
            'Imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
            // Agrega más reglas de validación según sea necesario para otros campos
        ]);

        $input = $request->all();

        // Manejo de la imagen
        if ($image = $request->file('Imagen')) {
            $destinationPath = 'image_path'; // Ruta donde deseas almacenar las imágenes
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['Imagen'] = "$profileImage";
        }

        Pelicula::create($input);

        return redirect()->route('pelicula.index')
            ->with('success', 'Pelicula created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Pelicula::find($id);

        return view('pelicula.show', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula = Pelicula::find($id);

        return view('pelicula.edit', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $request->validate([
            'Titulo_peli' => 'required',
            'Imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
            // Agrega más reglas de validación según sea necesario para otros campos
        ]);

        $input = $request->all();

        // Manejo de la imagen
        if ($image = $request->file('Imagen')) {
            $destinationPath = 'image_path'; // Ruta donde deseas almacenar las imágenes
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['Imagen'] = "$profileImage";
        } else {
            unset($input['Imagen']); // Elimina el campo de imagen si no se ha proporcionado una nueva imagen
        }

        $pelicula->update($input);

        return redirect()->route('pelicula.index')
            ->with('success', 'Pelicula updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id)->delete();

        return redirect()->route('pelicula.index')
            ->with('success', 'Pelicula deleted successfully');
    }
}
