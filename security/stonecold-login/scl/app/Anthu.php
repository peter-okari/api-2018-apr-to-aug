<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Anthu  extends Authenticatable
{

  //specifies the table associated with this model
  protected $table = 'anthu';
  //the primary key field
  public $primaryKey = 'anthu_id';
  //timestamps
  //this automatically adds timestamps for create and updates (created_at & updated_at)
  public $timestamps = true;
  //what attributes can be assigned
  protected $fillable = array('name', 'email', 'password', 'created_at', 'updated_at');
  //hidden attributes
  protected $hidden = array('password');


}
