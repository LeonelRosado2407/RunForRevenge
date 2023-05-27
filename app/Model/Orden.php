<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
  protected $table = "orden";

  protected $primaryKey = 'idorden';

  public $timestamps = false;
}
