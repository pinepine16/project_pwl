<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letters extends Model
{
    use HasFactory;

    protected $table = 'letters';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public $incrementing = true;

    protected $fillable = [
        'status', 'created_at', 'updated_at',
        'lettertype_id_type', 'mahasiswa_id'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function letterType()
    {
        return $this->belongsTo(Lettertype::class, 'lettertype_id_type','id_type');
    }

    public function detail()
    {
        return $this->hasOne(Letter_detail::class, 'letters_id');
    }
}
