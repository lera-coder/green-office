<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

/**
 * Class Pool
 * @package App\Models
 * @version January 10, 2021, 2:24 pm UTC
 *
 * @property \App\Models\Photo $mainImage
 * @property \Illuminate\Database\Eloquent\Collection $photo1s
 * @property \Illuminate\Database\Eloquent\Collection $photo2s
 * @property string $title_ukr
 * @property string $title_rus
 * @property string $card_title_ukr
 * @property string $card_title_rus
 * @property integer $price
 * @property string $short_description_ukr
 * @property string $short_description_rus
 * @property string $description_ukr
 * @property string $description_rus
 * @property string $length
 * @property string $width
 * @property string $height
 * @property integer $main_image
 * @property integer $category
 * @property integer $slider_image1
 * @property integer $slider_image2
 * @property integer $slider_image3
 * @property integer $gallery_image1
 * @property integer $gallery_image2
 * @property integer $gallery_image3
 * @property integer $gallery_image4
 * @property integer $gallery_image5
 */
class Pool extends Model
{

    use HasFactory;

    public $table = 'pools';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title_ukr',
        'title_rus',
        'card_title_ukr',
        'card_title_rus',
        'price',
        'short_description_ukr',
        'short_description_rus',
        'description_ukr',
        'description_rus',
        'length',
        'width',
        'height',
        'category',
        'main_image',
        'slider_image1',
        'slider_image2',
        'slider_image3',
        'gallery_image1',
        'gallery_image2',
        'gallery_image3',
        'gallery_image4',
        'gallery_image5',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title_ukr' => 'string',
        'title_rus' => 'string',
        'card_title_ukr' => 'string',
        'card_title_rus' => 'string',
        'price' => 'integer',
        'short_description_ukr' => 'string',
        'short_description_rus' => 'string',
        'description_ukr' => 'string',
        'description_rus' => 'string',
        'length' => 'string',
        'width' => 'string',
        'height' => 'string',
        'main_image' => 'integer',
        'category'=>'integer',
        'slider_image1' => 'integer',
        'slider_image2' => 'integer',
        'slider_image3' => 'integer',
        'gallery_image1' => 'integer',
        'gallery_image2' => 'integer',
        'gallery_image3' => 'integer',
        'gallery_image4' => 'integer',
        'gallery_image5' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title_ukr' => 'nullable|string|max:255',
        'title_rus' => 'required|string|max:255',
        'card_title_ukr' => 'nullable|string|max:255',
        'card_title_rus' => 'required|string|max:255',
        'price' => 'required|integer',
        'short_description_ukr' => 'nullable|string',
        'short_description_rus' => 'nullable|string',
        'description_ukr' => 'nullable|string',
        'description_rus' => 'nullable|string',
        'length' => 'required|string|max:255',
        'width' => 'required|string|max:255',
        'height' => 'required|string|max:255',
        'main_image' => 'required',
        'category'=>'required',
        'slider_image1' => 'nullable',
        'slider_image2' => 'nullable',
        'slider_image3' => 'nullable',
        'gallery_image1' => 'nullable',
        'gallery_image2' => 'nullable',
        'gallery_image3' => 'nullable',
        'gallery_image4' => 'nullable',
        'gallery_image5' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function poolCategory()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function mainImage()
    {
        return $this->belongsTo(\App\Models\Photo::class, 'main_image');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sliderImage1()
    {
        return $this->belongsTo(\App\Models\Photo::class, 'slider_image1');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sliderImage2()
    {
        return $this->belongsTo(\App\Models\Photo::class, 'slider_image2');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sliderImage3()
    {
        return $this->belongsTo(\App\Models\Photo::class, 'slider_image3');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function galleryImage1()
    {
        return $this->belongsTo(\App\Models\Photo::class, 'gallery_image1');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function galleryImage2()
    {
        return $this->belongsTo(\App\Models\Photo::class, 'gallery_image2');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function galleryImage3()
    {
        return $this->belongsTo(\App\Models\Photo::class, 'gallery_image3');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function galleryImage4()
    {
        return $this->belongsTo(\App\Models\Photo::class, 'gallery_image4');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function galleryImage5()
    {
        return $this->belongsTo(\App\Models\Photo::class, 'gallery_image5');
    }



    /**
     * @return Array
     */
    public function slider(){
        return [
           0 => [
               0=> ($this->sliderImage1)? $this->sliderImage1->photo_url : null,
               1=> ($this->sliderImage1)? $this->sliderImage1->name : null,
           ],

           1 => [
               0=> ($this->sliderImage2)? $this->sliderImage2->photo_url : null,
               1=> ($this->sliderImage2)? $this->sliderImage2->name : null,
           ],

           2 => [
               0=> ($this->sliderImage3)? $this->sliderImage3->photo_url : null,
               1=> ($this->sliderImage3)? $this->sliderImage3->name : null,
           ],


        ];
   }



    /**
     * @return Array
     */
   public function gallery(){
    return [
       0 => [
         0=> ($this->galleryImage1)? $this->galleryImage1->photo_url : null,
         1=> ($this->galleryImage1)? $this->galleryImage1->name : null,
       ],

       1 => [
        0=> ($this->galleryImage2)? $this->galleryImage2->photo_url : null,
        1=> ($this->galleryImage2)? $this->galleryImage2->name : null,

       ],

       2 => [
        0=> ($this->galleryImage3)? $this->galleryImage3->photo_url : null,
        1=> ($this->galleryImage3)? $this->galleryImage3->name : null,
       ],

       3 => [
        0=> ($this->galleryImage4)? $this->galleryImage4->photo_url : null,
        1=> ($this->galleryImage4)? $this->galleryImage4->name : null,
       ],

       4 => [
        0=> ($this->galleryImage5)? $this->galleryImage5->photo_url : null,
        1=> ($this->galleryImage5)? $this->galleryImage5->name : null,
       ],



    ];
}

   /**
     * @return string
     */
    public function price_api(){
        return ($this->category == 1)? $this->price.'€' : $this->price.'$';
    }

}
