<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $table = 'letters';

    protected $fillable = [
        'status', 'created_at', 'updated_at', 'uploaded_by',
        'lettertype_id_type', 'mahasiswa_id'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function letterType()
    {
        return $this->belongsTo(lettertype::class, 'lettertype_id_type');
    }

    public function detail()
    {
        return $this->hasOne(letter_detail::class, 'letters_id');
    }
}
