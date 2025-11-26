<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Jika Anda ingin melihat blog mana saja yang dimiliki kategori ini
    public function blogs(): HasMany 
    {
        // Relasi ini mencari 'category_id' di tabel 'blogs'
        return $this->hasMany(Blog::class);
    }
}