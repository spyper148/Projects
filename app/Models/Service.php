<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
      'name',
      'price',
        'img'
    ];

    public function images():HasMany
    {
        return $this->hasMany(ServiceImage::class,'service_id');
    }

    public function orders():BelongsToMany
    {
        return $this->belongsToMany(Order::class,'services_on_orders')->withPivot('count');
    }
}
