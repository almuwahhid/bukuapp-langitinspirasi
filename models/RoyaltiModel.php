<?php

class RoyaltiModel extends Model{
    // public "pemilik" = "pemilik";
    // public "admin" = "admin";
    // public "penulis" = "penulis";
    // protected $tableName = "users";

    protected $tableName = "penjualan_buku";
    function getRoyalti($where){
      $data = $this->getJoin(array('buku', 'penulis'),
      array('penjualan_buku.id_buku'   => "buku.id_buku", 'buku.id_penulis'   => "penulis.id_penulis"),
      "JOIN", $where);
      if($data){
        return $data;
      } else {
        return array();
      }
    }

    function getRoyaltiDetil($id){
      $data = $this->getJoin(array('buku', 'penulis'),
      array('penjualan_buku.id_buku'   => "buku.id_buku", 'buku.id_penulis'   => "penulis.id_penulis"),
      "JOIN", array('penjualan_buku.id_penjualan_buku'   => $id));
      if($data){
        return $data;
      } else {
        return array();
      }
    }
}
?>
