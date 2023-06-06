<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'origin_id',
        'species_id',
        'roast_level_id',
        'tasted_id',
        'processing_id',
        'title',
        'sub_title',
        'stock',
        'price',
        'description',
        'information',
    ];

    public function origin()
    {
        return $this->belongsTo(OriginProduct::class, 'origin_id');
    }

    public function processing()
    {
        return $this->belongsTo(ProcessingProduct::class, 'processing_id');
    }

    public function roastLevel()
    {
        return $this->belongsTo(RoastLevelProduct::class, 'roast_level_id');
    }

    public function species()
    {
        return $this->belongsTo(SpeciesProduct::class, 'species_id');
    }

    public function tasted()
    {
        return $this->belongsTo(TastedProduct::class, 'tasted_id');
    }
}
