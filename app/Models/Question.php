<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
      'title','slug','body','category_id','user_id'
    ];
//    protected $with = ['replies'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute()
    {
        return "/question/$this->slug";
    }
    public function user()
    {
     return $this->belongsTo(User::class);
    }

    public function replies()
    {
//        return $this;
        return $this->hasMany(Reply::class)->latest();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
