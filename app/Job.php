<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = [
        'user_id', 'title', 'description', 'trade_id', 'address_id'
    ];

     /**
     * Get the users of each address.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

     /**
     * Get the job trade.
     */
    public function trade()
    {
        return $this->hasOne('App\Trade', 'trade_id');
    }

     /**
     * Get the job quotes
     */
    public function quotes()
    {
        return $this->hasMany('App\Quote', 'job_id');
    }

      /**
     * Get the job quotes
     */
    public function media()
    {
        return $this->hasMany('App\Media', 'job_id');
    }
}