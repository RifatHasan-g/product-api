<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'is_active'];

    public function productQuantities()
    {
        return $this->hasMany(ProductQuantity::class);
    }
}
