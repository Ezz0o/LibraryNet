<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    //allow mass asssignment
    protected $fillable = ['name', 'author', 'dateofpublishing', 'price', 'tags'];
    public function scopeFilter($query, array $filters)
    {
        if($filters['tag'] ?? false)
        {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false)
        {
            $query->where('name', 'like', '%' . request('search') . '%')
                  ->orWhere('author', 'like', '%' . request('search') . '%')
                  ->orWhere('tags', 'like', '%' . request('search') . '%')
                  ->orWhere('dateofpublishing', 'like', '%' . request('search') . '%');
        }
    }
}
