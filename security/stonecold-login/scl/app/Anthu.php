<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Anthu extends Model implements Authenticatable
{

  use AuthenticableTrait;
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

  /**
 * Get the unique identifier for the user.
 *
 * @return mixed
 */
public function getAuthIdentifier()
{
  return 'email';
}
/**
 * Get the password for the user.
 *
 * @return string
 */
public function getAuthPassword()
{
    return $this->password;
}

/**
 * Get the e-mail address where password reminders are sent.
 *
 * @return string
 */
public function getReminderEmail()
{
    return 'email';
}

public function setRememberToken($value){
  $this->remember_token = $value;
}

public function getAuthIdentifierName(){
  return "email";
}
public function getRememberTokenName(){
  return '';
}
public function getRememberToken(){
  return '';
}
}
