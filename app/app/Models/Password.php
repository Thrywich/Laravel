<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Password extends Model
{
    
    use HasFactory;

    public function users(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    protected $casts = ['password'=> 'encrypted'];
    protected $fillable = ['site','login','password','user_id'];

}
