<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    //
    protected $table = 'quotes';

    protected $fillable = [
        'user_id', 'job_id', 'description', 'time', 'rate', 'estimate', 'status' 
    ];

    /**
     * Get the job of a quote.
     */
    public function job()
    {
        return $this->belongsTo('App\Job');
    }

}
