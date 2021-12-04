<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = "Empleados";
    protected $primaryKey = 'EmpID';
    protected $fillable = ['EmpCorreo', 'EmpDomicilio', 'EmpNombre', 'EmpTelefono', 'TipoEmpleado'];
    public $timestamps = false;

    public function getId()
    {

        return $this->EmpID;
    }

    public function setId($EmpID)
    {

        $this->EmpID = $EmpID;
    }

    public function getNombre()
    {

        return $this->EmpNombre;
    }

    public function setNombre($EmpNombre)
    {

        $this->EmpNombre = $EmpNombre;
    }
}
