<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Monedero extends Model
{
  protected $table = "monedero";
  //protected $primaryKey = 'iduser';

  //no tiene llave foranea

  public $timestamps = false;
}