<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'username' => 'required',
			'email'    => 'required|unique:users,email',
			'password' => 'required',
		];
	}
}
