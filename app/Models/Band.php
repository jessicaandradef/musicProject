<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $table= 'bandas';

    protected $fillable = [
        'name',
        'photo',
    ];

    public function albuns()
    {
        return $this->hasMany(Album::class, 'banda_id');
    }

}
