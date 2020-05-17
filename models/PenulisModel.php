<?php

class PenulisModel extends Model{
    // public "pemilik" = "pemilik";
    // public "admin" = "admin";
    // public "penulis" = "penulis";
    // protected $tableName = "users";
    protected $tableName = "penulis";

    function getPenulis(){
      $data = $this->get();
      if($data){
        return $data;
      } else {
        return array();
      }
    }
}
?>
