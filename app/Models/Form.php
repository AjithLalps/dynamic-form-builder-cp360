<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'content'
    ];
    
    /**
     * @inherited
     */
    public static function boot()
    {
        parent::boot();
        
        self::creating(
            function ($model) {
                $count = self::max('id') + 1;
                
                $model->code = "FRM-" . str_pad($count, 6, 0, STR_PAD_LEFT);
            }
        );
    
    }
}
