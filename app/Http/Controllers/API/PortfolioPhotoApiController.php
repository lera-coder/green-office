<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\PortfolioPhotoCollection;
use App\Models\PortfolioPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PortfolioPhotoResource;


class PortfolioPhotoApiController extends Controller
{

    public function show(){
        return new PortfolioPhotoCollection(PortfolioPhotoResource::collection(PortfolioPhoto::all()));
    }

}
