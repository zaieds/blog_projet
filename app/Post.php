<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table ='posts';
    //public $timestamps = false;

    /**
     * Get the user that authored the post.
     */
    public function author()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function hasComments()
    {
        return $this->hasMany('App\Comments');
    }



}
