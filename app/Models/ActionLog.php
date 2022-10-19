<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    protected $fillable = [
        'action', 'post_id', 'post_data', 'user_ip'
    ];
}
