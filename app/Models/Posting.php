<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;

    // protected $fillabale = ['title', 'type', 'brand', 'location', 'price', 'color', 'description'];

    public function scopeFilter($query, array $filters) {
        if($filters['type'] ?? false){                                       ///filter by tag function
            $query->where('type', 'like', '%' . request('type') . '%');     
        }

        // if($filters['search'] ?? false){                                    //search function
        //     $query->where('title', 'like', '%' . request('search') . '%')
        //     ->orWhere('location', 'like', '%' . request('search') . '%')
        //     ->orWhere('tags', 'like', '%' . request('search') . '%');     
        // }
    }

    public function user(){ //because i put user id as foreign key in posting table

        return $this->belongsTo(User::class, 'user_id');
    }
}
