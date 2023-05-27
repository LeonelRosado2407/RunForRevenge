<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
  protected $table = "user";

  protected $primaryKey = 'iduser';

  public $timestamps = false;

  protected $fillable =  ['username', 'email', 'password', 'idrol'];
}