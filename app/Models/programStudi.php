<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $table = 'program_studi';

    protected $primaryKey = 'id';

    protected $fillable = [ 'major_name'];

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;
}
