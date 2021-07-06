<?php


namespace App\ControllerHelpers;


use App\Models\Pool;
use App\Models\PortfolioPhoto;

class PhotoControllerHelper
{

    public function getInput($request){

        $input['name'] = $request->name;
        $imageName = time().'.'.$request->image->extension();
        $input['photo_url'] = 'https://admin.greenoffice.in.ua/public/images/main/'.$imageName;

        $request->image->move(public_path('images/main'), $imageName);

        return $input;
    }

    public function changePhotos($id, $photo){

        $photonamearr = explode('/', $photo->photo_url);
        $photoname = $photonamearr[count($photonamearr) - 1];

        $pools = Pool::all()->where('main_image' , $id);
        $portfolio_photos = PortfolioPhoto::all()->where('photo_id', $id);

        foreach ($pools as $pool){
            $pool->main_image = 1;
            $pool->save();
        }

        foreach ($portfolio_photos as $portfolio_photo){
            $portfolio_photo->photo_id = 1;
            $portfolio_photo->save();
        }

        unlink(public_path('/images/main/'.$photoname));
    }

}
