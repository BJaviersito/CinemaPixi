<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;

/**
 * Class HistorialController
 * @package App\Http\Controllers
 */
class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historials = Historial::paginate();

        return view('historial.index', compact('historials'))
            ->with('i', (request()->input('page', 1) - 1) * $historials->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $historial = new Historial();
        return view('historial.create', compact('historial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Historial::$rules);

        $historial = Historial::create($request->all());

        return redirect()->route('historial.index')
            ->with('success', 'Historial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historial = Historial::find($id);

        return view('historial.show', compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historial = Historial::find($id);

        return view('historial.edit', compact('historial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Historial $historial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Historial $historial)
    {
        request()->validate(Historial::$rules);

        $historial->update($request->all());

        return redirect()->route('historial.index')
            ->with('success', 'Historial updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $historial = Historial::find($id)->delete();

        return redirect()->route('historial.index')
            ->with('success', 'Historial deleted successfully');
    }
}
