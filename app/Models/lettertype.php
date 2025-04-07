<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterType extends Model
{
    use HasFactory;

    protected $table = 'lettertype';

    protected $fillable = ['letter_name'];

    public function letters()
    {
        return $this->hasMany(Letter::class, 'lettertype_id_type');
    }
}
