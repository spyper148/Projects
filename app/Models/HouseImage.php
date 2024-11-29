<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HouseImage extends Model
{
    use HasFactory;
    protected $guarded =  ['$id'];
    protected $fillable = [
        'img',
        'house_id',

    ];

    public function house():BelongsTo
    {
        return $this->belongsTo(House::class);
    }
}
