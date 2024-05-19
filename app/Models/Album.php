<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albuns';

    protected $fillable = [
        'name',
        'photo',
        'data_lancamento',
        'banda_id'
    ];

    public function banda()
    {
        return $this->belongsTo(Band::class, 'banda_id');
    }
}
