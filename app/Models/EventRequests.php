<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRequests extends Model
{
    use HasFactory;

    public function venue(){
        return $this->belongsTo(Venue::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
