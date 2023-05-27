<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Logros extends Model
{
  protected $table = "logros";

  protected $primaryKey = 'idlogro';

  public $timestamps = false;
}
