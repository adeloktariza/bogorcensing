<?php

class Berita extends Elegant\Model {

  protected $table = "berita";
  protected $primary = "id_berita";

  public function scopeAdmin(){

  	return $this->hasOne('Admin','id_admin');
  
  }
  public function scopeLaporan(){

  	return $this->hasOne('Laporan','id_laporan');
  
  }

}