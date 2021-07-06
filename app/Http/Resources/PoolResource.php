<?php

namespace App\Http\Resources;

use App\Models\GalleryPoolPhoto;
use App\Models\Photo;
use App\Models\SliderPoolPhoto;
use Illuminate\Http\Resources\Json\JsonResource;

class PoolResource extends JsonResource
{
    private Photo $photo;


    /**
     * @param $id
     * @return string|null
     */
    private function getLink($id){


         if(is_null($id)){
             $this->photo->name = null;
             return null;
         }
         else{
             $this->photo = Photo::find($id);
             return $this->photo->photo_url;
         }
    }

    /**
     * @return string
     */
    private function getAlt(){
        return $this->photo->name;
    }




    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title_ukr' => $this->title_ukr,
            'title_rus' => $this->title_rus,
            'card_title_ukr' => $this->card_title_ukr,
            'card_title_rus' => $this->card_title_rus,
            'price' => $this->price_api(),
            'short_description_ukr' => $this->short_description_ukr,
            'short_description_rus' => $this->short_description_rus,
            'description_ukr' => $this->description_ukr,
            'description_rus' => $this->description_rus,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'category' =>$this->poolCategory->name,
            'photo' => $this->getLink($this->main_image),
            'photo_alt' => $this->getAlt(),
            'slider_image1'=> $this->getLink($this->slider_image1),
            'slider_image1_alt'=> $this->getAlt(),
            'slider_image2'=> $this->getLink($this->slider_image2),
            'slider_image2_alt'=> $this->getAlt(),
            'slider_image3'=> $this->getLink($this->slider_image3),
            'slider_image3_alt'=> $this->getAlt(),
            'gallery_image1'=> $this->getLink($this->gallery_image1),
            'gallery_image1_alt'=> $this->getAlt(),
            'gallery_image2'=> $this->getLink($this->gallery_image2),
            'gallery_image2_alt'=> $this->getAlt(),
            'gallery_image3'=> $this->getLink($this->gallery_image3),
            'gallery_image3_alt'=> $this->getAlt(),
            'gallery_image4'=> $this->getLink($this->gallery_image4),
            'gallery_image4_alt'=> $this->getAlt(),
            'gallery_image5'=> $this->getLink($this->gallery_image5),
            'gallery_image5_alt'=> $this->getAlt(),
        ];
    }
}
