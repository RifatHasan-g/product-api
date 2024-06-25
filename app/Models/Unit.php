<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'code', 'for', 'base_unit', 'operator', 'operation_value', 'is_active'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
