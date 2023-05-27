<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Coins extends Model
{
  protected $table = "coins";

  protected $primaryKey = 'idcoins';

  public $timestamps = false;
}
