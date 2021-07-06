<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PortfolioPhoto
 * @package App\Models
 * @version January 12, 2021, 11:49 am UTC
 *
 * @property \App\Models\Photo $photo
 * @property integer $order
 * @property integer $photo_id
 */
class PortfolioPhoto extends Model
{

    use HasFactory;

    public $table = 'portfolio_photos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'order',
        'photo_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order' => 'integer',
        'photo_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order' => 'integer|nullable',
        'photo_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function photo()
    {
        return $this->belongsTo(\App\Models\Photo::class, 'photo_id');
    }
}
