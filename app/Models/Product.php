<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'picture','category_id', 'title', 'price', 'description'
    ];


    // has many relation
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
    public function comments() {
       return $this->hasMany(Comment::class);
    }
    public function feedbacks() {
        return $this->hasMany(FeedBack::class);
     }
}
