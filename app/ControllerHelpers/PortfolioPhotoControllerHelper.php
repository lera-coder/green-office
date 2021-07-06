<?php


namespace App\ControllerHelpers;


use App\Models\PortfolioPhoto;

class PortfolioPhotoControllerHelper
{


    public function setDeleteOrder($order){
        $filtered = PortfolioPhoto::all()->where('order', '>', $order);

        foreach($filtered as $photo){
            $photo->update( ['order' => $photo['order'] - 1]);
        }

    }


    public function setCreateOrder($order){
        $filtered = PortfolioPhoto::all()->where('order', '>=', $order);

        foreach($filtered as $photo){
            $photo->update( ['order' => $photo['order'] + 1]);
        }

    }

    public function setUpdateOrder($oldOrder , $newOrder){
        if($oldOrder < $newOrder){
            $filtered =  PortfolioPhoto::all()->whereBetween('order', [$oldOrder , $newOrder]);

            foreach($filtered as $photo){
                $photo->update( ['order' => $photo['order'] - 1]);
            }
        }

        else{
            $filtered =  PortfolioPhoto::all()->whereBetween('order', [$newOrder ,$oldOrder]);

            foreach($filtered as $photo){
                $photo->update( ['order' => $photo['order'] + 1]);
            }
        }



    }


    public function getCreateInput($input){

        if(is_null($input['order'])){
            $input['order'] = PortfolioPhoto::all()->max('order') + 1;
        }
        return $input;
    }



}
