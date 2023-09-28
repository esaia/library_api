<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(LoginRequest $request)
	{
		$credentials = $request->validated();

		if (!Auth::attempt($credentials)) {
			throw ValidationException::withMessages(['email' =>  'email or password is not correct']);
		}

		$request->session()->regenerate();

		return to_route('book.dashboard');
	}

	public function store(RegisterRequest $request)
	{
		$credentials = $request->validated();

		User::create($credentials);

		return to_route('login');
	}

	public function logout()
	{
		auth()->logout();

		return to_route('login');
	}
}
