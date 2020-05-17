<?php

class BukuModel extends Model{
    // public "pemilik" = "pemilik";
    // public "admin" = "admin";
    // public "penulis" = "penulis";
    // protected $tableName = "users";

    protected $tableName = "buku";
    function getBuku(){
      $data = $this->getJoin(array('penulis'), array(
        'buku.id_penulis'   => "penulis.id_penulis"));
      if($data){
        return $data;
      } else {
        return array();
      }
    }
}
?>
