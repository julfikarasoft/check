<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
      protected $fillable = [
        'category_id','subcategory_id','product_name','product_price','product_unit'
    ];
      public function subCategory()
    {
        return $this->belongsTo(Subcategory::class);
    }  public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
