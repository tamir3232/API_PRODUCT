<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;

class product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'name',
        'Description',
        'Author_id',
    ];

    public function  Produsen(): BelongsTo
    {
        return $this->belongsTo(User::class, 'Author_id', 'id');
    }
}
