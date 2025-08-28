<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class endlevelcategory extends Model
{
    protected $table = 'endlevelcategories';
    protected $fillable = ['tcat_name', 'mcat_name', 'ecat_name'];
}
