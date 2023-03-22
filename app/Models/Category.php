<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subcategory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name','image'];

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'category_id','id');
    }
    public function products() 
    {
        return $this->hasMany(Product::class, 'cate_id','subcate_id','id');
    }

}
