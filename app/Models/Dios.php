<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dios extends Model
{
    protected $table = 'dioses'; // 👈 nombre exacto de tu tabla
      protected $fillable = ['nombre', 'poder', 'descripcion'];
}
