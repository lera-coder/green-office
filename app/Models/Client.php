<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\Status;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Client
 * @package App\Models
 * @version January 12, 2021, 3:14 pm UTC
 *
 * @property \App\Models\Status $status
 * @property string $name
 * @property string $telephone_number
 * @property string $answer
 * @property string $notes
 */
class Client extends Model
{

    use HasFactory;

    public $table = 'clients';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'telephone_number',
        'answer',
        'notes',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'telephone_number' => 'string',
        'answer' => 'string',
        'notes' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'telephone_number' => 'required|string|max:20',
        'answer' => 'nullable|string',
        'notes' => 'nullable|string',
        'status' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/



    public function status()
    {

        return $this->belongsTo(\App\Models\Status::class, 'status');
    }


}
