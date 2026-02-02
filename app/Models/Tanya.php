<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanya extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'tanya';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'pertanyaan',
        'jawaban',
    ];
}
