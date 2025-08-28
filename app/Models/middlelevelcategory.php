<?php

namespace App\Models;

use App\Models\toplevelcategory;
use Illuminate\Database\Eloquent\Model;

class middlelevelcategory extends Model
{

    protected $table = 'middlelevelcategories';
    protected $fillable = ['tcat_name', 'mcat_name'];
    
    public function toplevelcategory()
    {
        return $this->belongsTo(toplevelcategory::class, 'tcat_name','id');
    }
    

}
