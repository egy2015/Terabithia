<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'catalogs_id', 'transactions_id'
    ];

    protected $hidden = [];

    public function transaction()
    {

        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    
    }

    public function catalog()
    {

        return $this->belongsTo(Catalog::class, 'catalogs_id', 'id');
    
    }
}
