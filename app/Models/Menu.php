<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Menu extends Model
{
    use HasFactory;

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function logoUrl(): string
    {
        return Storage::url($this->photo);
    }
}
