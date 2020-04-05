<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    protected $table ='comments';
    //public $timestamps = false;

    protected $fillable = [
        'post_id',
        'comment_name', 
        'comment_email', 
        'comment_content'
        ,//'comment_date'
    ];
    /**
     * Get the user that authored the post.
     */
    public function post()
    {
        return $this->belongsTo('App\Post','post_id');
    }

   

}
