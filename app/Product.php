<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table= "tblproduct";
    public $timestamps = false;

    protected $primaryKey = "PID";
}
