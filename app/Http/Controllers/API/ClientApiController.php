<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientApiController extends Controller
{
    public function store(Request $request)
    {
            $input = $request->all();
            $input['notes']= ' ';
            $input['status']= 1;
            return Client::create($input);

    }
}
