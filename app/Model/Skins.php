<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Skins extends Model
{
  protected $table = "skins";

  protected $primaryKey = 'idskins';

  public $timestamps = false;
}
