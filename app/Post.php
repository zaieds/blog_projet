<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table ='posts';
    //public $timestamps = false;
    protected $fillable = [
        'user_id', 'post_date', 'post_content', 'post_title', 'post_status', 'post_name', 'post_type','post_category'
    ];

    public static function create($data)
    {
        dd($data);

        return parent::create($data);
    }

    /**
     * Get the owner of the post.
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
