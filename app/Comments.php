<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    protected $table ='comments';
    public $timestamps = false;

    /**
     * Get the user that authored the post.
     */
    public function post()
    {
        return $this->belongsTo('App\Post','post_id');
    }



}
