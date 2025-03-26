<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class letters extends Model
{
    protected $table = 'letters';

    protected $primaryKey = 'id';

    protected $fillable = [ 'alamat', 'semester', 'keperluan', 'kode_mk','nama_mk','tujuan','topik'];

    protected $keyType = 'string';

    public $incrementing = false;
}
