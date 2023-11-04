<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','product_id','user_id','discription', 'vote_up', 'vote_down','category_id','vote'
    ];
    public function category() {
        return $this->belongsTo('App\Models\FeedbackCategory');
    }

    public function product() {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
     }
     public function users() {
         return $this->belongsTo('App\Models\User', 'user_id', 'id');
      }
}
