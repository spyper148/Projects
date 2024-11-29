<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model
{
    use HasFactory;
    protected $guarded =  ['$id'];

 protected $fillable =[
   'name',
   'description',
   'min_size',
   'max_size',
   'price_weekdays_night',
   'price_weekend_night',
   'price_weekdays_day',
   'price_weekend_day',
 ];

    public function images():HasMany
    {
        return $this->hasMany(HouseImage::class,'house_id');
    }

    public function orders():BelongsToMany
    {
        return $this->belongsToMany(Order::class,'houses_on_orders')->withPivot('count');
    }
}
