<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Models\Client;

class CreateClientRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Client::$rules;
    }
}
