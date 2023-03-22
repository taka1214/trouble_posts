<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'trouble_post_id',
        'message',
    ];

    public function troublePost(){
        return $this->belongsTo(troublePost::class);
    }
}
