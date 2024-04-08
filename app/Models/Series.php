<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable = ['id','name'];
    public $timestamps = false;
    use HasFactory;

    public function seasons()
{
    return $this->hasMany(Season::class);
}
}
