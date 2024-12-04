<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use SoftDeletes; 
    use HasFactory;
    public $fillable = ['rut', 'nombre', 'correo', 'razonsocial'];
    protected $dates = [ 'deleted_at' ];
    protected $primaryKey = 'id';
}
