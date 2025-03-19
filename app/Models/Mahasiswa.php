<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'id';

    protected $fillable = [ 'name', 'address', 'semester'];

    protected $keyType = 'string';

    public $incrementing = false;
}
