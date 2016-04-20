<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class Mongodb extends Moloquent
{
    protected $connection = "mongodb";
    protected $collection = "comments";
    //private $collection = "comments_likes";
}
