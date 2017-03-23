<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

   protected $fillable = [
        'user_id', 'company', 'addressline1', 'addressline2', 'city', '	postcode', 
        'country', 'telephone1','telephone2', '	is_default'
    ];


    /**
     * Get the users of each address.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
