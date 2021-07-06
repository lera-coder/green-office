<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Status
 * @package App\Models
 * @version January 14, 2021, 12:21 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $clients
 * @property string $name
 */
class Status extends Model
{

    use HasFactory;

    public $table = 'statuses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function clients()
    {
        return $this->hasMany(\App\Models\Client::class, 'status');

//        return $this->belongsTo(Client::class, 'status', 'id')->withDefault([
//            'name' => '1',
//        ]);
    }


//    public function client(){
//
//        return $this->hasOne('App\Phone', 'foreign_key');


//        return $this->belongsTo(Client::class)->withDefault([
//            'name' => '1',
//        ]);
//    }
}
