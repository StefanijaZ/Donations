<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aplication extends Model
{
    //
    protected $table = 'requests';
    protected $guarded = [];
    public $timestamps = true;



    public function nameUser()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function getDonation()
    {
        return $this->belongsTo(Donation::class, 'donation_id');
    }

}
