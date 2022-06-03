<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Usuario;

class prueba extends Model{
    protected $table      = 'prueba';
    protected $primaryKey = 'idCt';

    protected $returnType     = 'object';
    protected $allowedFields = ['encargado','dispositivo'];
}