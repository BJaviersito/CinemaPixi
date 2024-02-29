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
        request()->validate(Serie::$rules);

        $serie = Serie::create($request->all());

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
        request()->validate(Serie::$rules);

        $serie->update($request->all());

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
