<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RoastLevelProduct extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'origin_id');
    }
}
