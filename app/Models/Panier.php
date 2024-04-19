<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
        
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
    public function user()
    {
        return $this->belogsTo(User::class, 'user_id');
        
    }
}
