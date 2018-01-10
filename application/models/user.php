<?php

class User extends Elegant\Model {
  
  protected $table = "user";
  protected $primary = "id_user";

  public function scopeAdmin(){

  	return $this->belongsTo('Admin');
  
  }
}