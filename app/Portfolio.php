<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table= "tblportfolio";
    public $timestamps = false;

    protected $primaryKey = "PortfolioID";
    
}
