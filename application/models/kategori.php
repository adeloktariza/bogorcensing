<?php

class Kategori extends Elegant\Model {
  
  protected $table = "kategori";
  protected $primary = "id_kategori";

  public function scopelaporan(){

  	return $this->belongsTo('Kategori','id_kategori');
  
  }
}