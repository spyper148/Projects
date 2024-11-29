<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentImage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
      'img',
      'comment_id'
    ];

    public function comment():BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
}
