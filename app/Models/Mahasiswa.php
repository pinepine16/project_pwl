<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'address',
        'name',
        'nrp',
        'semester',
        'user_id',
    ];

    /**
     * Mahasiswa dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Mahasiswa punya banyak surat.
     */
    public function letters()
    {
        return $this->hasMany(Letter::class, 'mahasiswa_id');
    }
}
