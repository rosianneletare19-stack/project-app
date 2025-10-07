<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelationBlogCategory extends Model
{
    use HasFactory;
    protected $table= 'relation_blog_categorys';
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
