<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id','user_id', 'comment', 'rating'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
     }
     public function users() {
         return $this->belongsTo('App\Models\User', 'user_id', 'id');
      }
}
