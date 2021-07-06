<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\SliderPoolPhotoCollection;
use App\Http\Resources\SliderPoolPhotoResource;
use App\Models\Pool;
use App\Models\SliderPoolPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PoolCollection;
use App\Http\Resources\PoolResource;

class PoolApiController extends Controller
{

    public function all(){
        return new PoolCollection(PoolResource::collection(Pool::all()));

    }

    public function show($id){
//        dd(SliderPoolPhoto::all()->where('pool_id', $id));
        return new PoolResource(Pool::find($id));
//        return new SliderPoolPhotoCollection(SliderPoolPhotoResource::collection(SliderPoolPhoto::all()));

    }
}
