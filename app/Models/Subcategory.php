<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id','image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function products() 
    {
        return $this->hasMany(Product::class, 'cate_id','subcate_id','id');
    }
}
