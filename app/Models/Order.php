<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'status',
        'date_start',
        'date_end',
        'price',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function houses():BelongsToMany
    {
        return $this->belongsToMany(House::class,'houses_on_orders',)->withPivot('count');
    }

    public function services():BelongsToMany
    {
        return $this->belongsToMany(Service::class,'services_on_orders')->withPivot('count');
    }

    public function transaction():HasOne
    {
        return $this->hasOne(Transaction::class);
    }
}
