<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function status(){
        return $this->belongsTo(Status::class,"status_id");
    }

    public function host(){
        return $this->belongsTo(User::class , "host_id");
    }

    public function category(){
        return $this->belongsTo(Category::class,"category_id" );
    }
    public function venue(){
        return $this->belongsTo(Venue::class ,"venue_id");
    }


}

