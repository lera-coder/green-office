<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pool;
use App\Http\Resources\PoolResource;
use App\Http\Resources\PoolCollection;

class PoolCategoryApiController extends Controller
{
    public function show($category){
        return new PoolCollection(PoolResource::collection(Pool::all()->where('category', $category)));
    }
}
