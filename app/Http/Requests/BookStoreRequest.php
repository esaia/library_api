<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
	public function rules(): array
	{
		return [
			'name'     => 'required|min:4|max:40',
			'year'     => 'required|integer',
			'status'   => 'required',
			'authors'  => 'required',
		];
	}
}
