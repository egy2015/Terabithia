<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatalogPicture extends Model
{
    
    use SoftDeletes;

    protected $fillable = [
        'catalogs_id','filename', 'is_default' 
    ];

    protected $hidden = [

    ];

    public function catalog()
    {

        return $this->belongsTo(Catalog::class,'catalogs_id', 'id');
    
    }

    public function getFilenameAttribute($value)
    {
        return url('storage/'.$value);
    }
}
