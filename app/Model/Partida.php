<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
  protected $table = "partida";

  protected $primaryKey = 'idpartida';

  public $timestamps = false;
}

