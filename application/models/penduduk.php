<?php

class Penduduk extends Elegant\Model {
  
  protected $table = "penduduk";
  protected $primary = "nik";

  public function scopeLaporan(){

  	return $this->belongsTo('Laporan','nik');
  
  }
}