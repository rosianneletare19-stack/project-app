<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->hasMany(RelationBlogCategory::class);
    }

    public function user(){
        return $this->hasMany(RelationBlogUser::class);
    }
}
