<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registroreporte extends Model
{
    use SoftDeletes; 
    use HasFactory;
    protected $table = 'documento';
    protected $primaryKey = 'id';
    public $timestamps=false;

    public function clientes(){
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
