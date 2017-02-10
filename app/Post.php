<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = ['title', 'body'];


    // fields that i do not allow to save
    //protected $guarded =
}
