<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable  = ['title', 'price', 'body'];
    public function category(){
        return $this->belongsTo(Category::class); //pertenece a una categoria
    }
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class); //pertenece a una categoria
    }
}
