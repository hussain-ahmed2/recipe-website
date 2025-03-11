<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recipe() 
    {
        return $this->belongsTo(Recipe::class);
    }
}
