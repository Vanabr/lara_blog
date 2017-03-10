<?php

/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 09.03.17
 * Time: 11:39
 */
namespace App\Repositories;

use App\Post;
use App\Redis;

class Posts
{
    protected $redis;

    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    public function all()
    {
        return Post::all();
    }
}