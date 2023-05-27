<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
  protected $table = "compra";

  protected $primaryKey = 'idcompra';

  public $timestamps = false;
}