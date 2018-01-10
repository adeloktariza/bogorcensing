<?php

use Elegant\Model as Timex;

class Laporan extends Elegant\Model {
  
  protected $table = "laporan";
  protected $primary ="id_laporan";

  public function scopePenduduk(){

  	return $this->hasMany('Penduduk','nik');
  
  }

  public function scopeKategori(){

  	return $this->hasOne('Kategori','id_kategori');
  
  }

}