<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table= "tblcategory";
    public $timestamps = false;
    
    protected $primaryKey = "CategoryyID";
}
