<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

/**
 * Class SerieController
 * @package App\Http\Controllers
 */
class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Serie::paginate();

        return view('serie.index', compact('series'))
            ->with('i', (request()->input('page', 1) - 1) * $series->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serie = new Serie();
        return view('serie.create', compact('serie'));
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
            'Titulo_serie' => 'required',
            'Imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
            // Agrega más reglas de validación según sea necesario para otros campos
        ]);

        $input = $request->all();

        // Manejo de la imagen
        if ($image = $request->file('Imagen')) {
            $destinationPath = 'image_path'; // Ruta donde deseas almacenar las imágenes
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['Imagen'] = $profileImage;
        }

        Serie::create($input);

        return redirect()->route('serie.index')
            ->with('success', 'Serie created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serie = Serie::find($id);

        return view('serie.show', compact('serie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = Serie::find($id);

        return view('serie.edit', compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Serie $serie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serie $serie)
    {
        $request->validate([
            'Titulo_serie' => 'required',
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

        $serie->update($input);

        return redirect()->route('serie.index')
            ->with('success', 'Serie updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $serie = Serie::find($id)->delete();

        return redirect()->route('serie.index')
            ->with('success', 'Serie deleted successfully');
    }
}
