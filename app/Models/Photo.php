<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Photo
 * @package App\Models
 * @version January 10, 2021, 3:01 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $pools
 * @property \Illuminate\Database\Eloquent\Collection $pool1s
 * @property \Illuminate\Database\Eloquent\Collection $portfolioPhotos
 * @property \Illuminate\Database\Eloquent\Collection $pool2s
 * @property string $name
 * @property string $photo_url
 */
class Photo extends Model
{

    use HasFactory;

    public $table = 'photos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'photo_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'photo_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'string|max:255',
        'photo_url' => 'string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function pools()
    {
        return $this->belongsToMany(\App\Models\Pool::class, 'gallery_pool_photos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pool1s()
    {
        return $this->hasMany(\App\Models\Pool::class, 'main_image');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function portfolioPhotos()
    {
        return $this->hasMany(\App\Models\PortfolioPhoto::class, 'photo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function pool2s()
    {
        return $this->belongsToMany(\App\Models\Pool::class, 'slider_pool_photos');
    }
}
