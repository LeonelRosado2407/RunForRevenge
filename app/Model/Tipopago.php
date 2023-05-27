<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Tipopago extends Model
{
  protected $table = "tipopago";

  protected $primaryKey = 'idtipopago';

  public $timestamps = false;
}