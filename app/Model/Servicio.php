<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  protected $table = "servicios";

  protected $primaryKey = 'idtiposervicio';

  public $timestamps = false;
}


