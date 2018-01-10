<?php

class Admin extends Elegant\Model {

  protected $table = "admin";
  protected $primary = "id_admin";

  public function scopeUser(){

  	return $this->hasOne('User','id_user')->where('level', 0);
  
  }

  public function scopeBerita(){

  	return $this->belongsTo('Berita');
  
  }

}