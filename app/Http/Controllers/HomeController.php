<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class HomeController extends Controller
{
    public function index()
    {
    	$notas = Nota::where('estatus', 1)->get();
    	return view('welcome', compact('notas'));
    }

    public function ver($slug)
    {
    	$nota = Nota::where([
    		['slug', $slug],
    		['estatus', 1]
    	])->firstOrFail();

    	$notas = Nota::where([
    		['id', '<>', $nota->id],
    		['estatus', 1],
    	])
    	->orderBy('fecha', 'desc')
    	->take(3)
    	->get();

    	return view('nota', compact('nota', 'notas'));
    }
}
