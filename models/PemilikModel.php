<?php

class PemilikModel extends Model{
    // public "pemilik" = "pemilik";
    // public "admin" = "admin";
    // public "penulis" = "penulis";
    // protected $tableName = "users";
    protected $tableName = "pemilik";

    function getPemilik(){
      $data = $this->get();
      if($data){
        return $data;
      } else {
        return array();
      }
    }
}
?>
