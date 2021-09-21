<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{

    protected $table = 'donations';
    protected $guarded = [];
    public $timestamps = true;


    public function requests()
    {
        return $this->hasMany(Aplication::class);
    }

}
