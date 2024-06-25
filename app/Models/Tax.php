<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tax extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'rate', 'is_active'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
