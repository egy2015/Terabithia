<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CatalogPicture;

class Catalog extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name', 'type', 'description', 'price', 'slug', 'quantity'
    ];

    protected $hidden = [];

    public function pictures()
    {

        return $this->hasMany(CatalogPicture::class, 'catalogs_id');
    
    }

}
