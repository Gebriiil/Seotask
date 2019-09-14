<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Dimsav\Translatable\Translatable;
    protected $fillable=['image'];
    public $translatedAttributes = ['name','desc','price'];
}
