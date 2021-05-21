<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class GetApisController extends Controller
{
    public function get()
    {
    	$response = Http::get('https://jsonplaceholder.typicode.com/posts');
    	dd($response->collect(), $response->status());
    }

    public function getOne()
    {
    	$response = Http::get('https://jsonplaceholder.typicode.com/posts/1');
    	dd($response->collect(), $response->status());
    }

    public function post()
    {
    	$response = Http::post('https://jsonplaceholder.typicode.com/posts', [
    		'userId' => 1,
    		'title' => 'Título de Prueba',
    		'body' => 'lorem ipsum',
    	]);

    	dd($response->collect(), $response->status());
    }

    public function put()
    {
    	$response = Http::put('https://jsonplaceholder.typicode.com/posts/1', [
    		'userId' => 1,
    		'title' => 'Edit de título',
    		'body' => 'lorem ipsum',
    	]);

    	dd($response->collect(), $response->status());
    }

    public function delete()
    {
    	$response = Http::delete('https://jsonplaceholder.typicode.com/posts/1');
    	dd($response->collect(), $response->status());
    }
}
