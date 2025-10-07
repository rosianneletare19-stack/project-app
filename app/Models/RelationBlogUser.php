<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelationBlogUser extends Model
{
    use HasFactory;
    protected $table= 'relation_blog_users';
    protected $guarded = [];

    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
