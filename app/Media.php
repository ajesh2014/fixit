<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    protected $table = 'media';

    protected $fillable = [
        'job_id' , 'filename'
    ];

    public function job()
    {
        return $this->belongsTo('App\Job', 'job_id');
    }

}
