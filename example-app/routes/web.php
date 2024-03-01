<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ListaRepController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ResenaController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TipoVideoController;
use App\Models\Pelicula;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Perfil', function () {
    return view('perfil.perfil');
});
Route::get('/Home', function () {
    return view('pixicinema');
});
Route::get('/Peliculas', function () {
    return view('pelicula.pelicula');
});
Route::get('/Series', function () {
    return view('serie.serie');
});

Route::get('/Peliculas', function () {
    $peliculas = Pelicula::all();
    view()->share('peliculas', $peliculas);
    return view('pelicula.pelicula');
});

Route::resource('pelicula', PeliculaController::class);
Route::resource('perfil', PerfilController::class);
Route::resource('lista_rep', ListaRepController::class);
Route::resource('historial', HistorialController::class);
Route::resource('resena', ResenaController::class);
Route::resource('serie', SerieController::class);
Route::resource('categoria', CategoriaController::class);
Route::resource('usuario', UsuarioController::class);
Route::resource('tipo_video', TipoVideoController::class);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/Cinema', function () {
    return view('Cinema');
})->middleware(['auth', 'verified'])->name('Cinema');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


