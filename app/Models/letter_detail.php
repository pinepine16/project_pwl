<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letter_detail extends Model
{
    protected $table = 'letter_detail';

    protected $primaryKey = 'id';

    protected $fillable = [ 'alamat', 'semester', 'keperluan', 'kode_mk','nama_mk','topik'];

    protected $keyType = 'string';

    public $incrementing = true;
}
