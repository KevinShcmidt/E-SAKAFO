<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'adresse', 'logo', 'phone', 'heure_ouverture', 'heure_fermeture'
    ];

    public function logoUrl(): string
    {
        return Storage::url($this->logo);
    }
}
