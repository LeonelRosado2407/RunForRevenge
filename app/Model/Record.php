<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
  protected $table = "record";

  protected $primaryKey = 'idrecord';

  public $timestamps = false;
}