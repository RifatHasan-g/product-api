<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'sku', 'symbology', 'brand_id', 'category_id', 'unit_id', 'tax_id', 'price', 'qty', 'alert_qty', 'tax_method', 'has_stock', 'has_expiry_date', 'expiry_date', 'details', 'is_active'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    public function productQuantities()
    {
        return $this->hasMany(ProductQuantity::class);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
