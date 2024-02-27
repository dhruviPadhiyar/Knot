<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPricing extends Model
{
    use HasFactory;
    protected $fillable = ['category', 'price','event_id'];

    public function events(){
        return $this->hasMany(Event::class);
    }
}
