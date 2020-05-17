<?php

class BukuPenulisModel extends Model{
    // public "pemilik" = "pemilik";
    // public "admin" = "admin";
    // public "penulis" = "penulis";
    // protected $tableName = "users";

    protected $tableName = "buku_penulis";
    function getBukuPenulis($id_penulis){
      $data = $this->getJoin(array('penulis', 'buku'),
      array('penulis.id_penulis'   => "buku_penulis.id_penulis", 'buku.id_buku'   => "buku_penulis.id_buku"),
      "JOIN", array('buku_penulis.id_penulis'   => $id_penulis));
      if($data){
        return $data;
      } else {
        return array();
      }
    }
}
?>
