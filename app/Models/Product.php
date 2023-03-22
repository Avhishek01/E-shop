<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\subcategory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable =[
        'cate_id',
        'subcate_id',
        'name',
        'slug',
        'description',
        'original_price',
        'selling_price',
        'image',
        'tax',
        'qty',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description',

    ];
    public function categories() 
    {   
        return $this->belongsTo(Category::class,'cate_id','id' );
       
    }
    public function subcategories() 
    {
        return $this->belongsTo(Subcategory::class, 'subcate_id','id');
    }
}
