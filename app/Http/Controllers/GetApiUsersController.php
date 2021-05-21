<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetApiUsersController extends Controller
{
   function __construct() {
   		$this->url = 'http://ec2-18-222-140-64.us-east-2.compute.amazonaws.com/api';
   		$this->token = '1|qMjUz6uSMCrXS1oJEC6wQRgOyzeWe3r2XHmH764H';
   }

	public function getRegister()
	{
    	$response = Http::post($this->url.'/register', [
		    'name' => 'Admin',
		    'email' => 'admin2@admin.com',
		    'password' => '1234Qwer.',
		    'password_confirmation' => '1234Qwer.'
    	]);

    	dd($response->collect(), $response->status());
	}

	public function getUsers()
	{
		$url = $this->url.'/users';
		$response = Http::withToken($this->token)->get($url);
		dd($response->collect(), $response->status());
	}

	public function getUser()
	{
		$url = $this->url.'/users/1';
		$response = Http::withToken($this->token)->get($url);
		dd($response->collect(), $response->status());
	}

	public function postUser()
	{
		$url = $this->url.'/users';
		$response = Http::withToken($this->token)->post($url, [
		    'name' => 'Admin3',
		    'email' => 'admin4@admin.com',
		    'password' => '1234Qwer.',
		    'password_confirmation' => '1234Qwer.'
    	]);
		dd($response->collect(), $response->status());
	}


	//Token 1|qMjUz6uSMCrXS1oJEC6wQRgOyzeWe3r2XHmH764H

}
