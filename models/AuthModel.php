<?php

class AuthModel extends Model{
    // public "pemilik" = "pemilik";
    // public "admin" = "admin";
    // public "penulis" = "penulis";
    // protected $tableName = "users";

    function checkLoginPemilik($username, $password){
      $data = $this->getWhereCustom("pemilik", array(
        'username_pemilik'   => $username,
      ));
      if(!$data){
        return array(
          'result'   => false,
          'message'  => "Username Salah"
        );
      } else {
        if($password == $data[0]->password_pemilik){
          return array(
            'result'   => true,
            'message'  => "Login Berhasil",
            'type'     => "pemilik",
            'data'     => $data[0],
          );
        } else {
          return array(
            'result'   => false,
            'message'  => "Password Salah"
          );
        }
      }
    }

    function checkLoginPenulis($username, $password){
      $data = $this->getWhereCustom("penulis", array(
        'username_penulis'   => $username,
      ));
      if(!$data){
        return array(
          'result'   => false,
          'message'  => "Username Salah"
        );
      } else {
        if($password == $data[0]->password_penulis){
          return array(
            'result'   => true,
            'message'  => "Login Berhasil",
            'type'     => "penulis",
            'data'     => $data[0],
          );
        } else {
          return array(
            'result'   => false,
            'message'  => "Password Salah"
          );
        }
      }
    }

    function checkLoginAdmin($username, $password){
      $data = $this->getWhereCustom("admin", array(
							'username_admin'   => $username,
						));
      if(!$data){
        return array(
  							'result'   => false,
                'message'  => "Username Salah"
  						);
      } else {
        if($password == $data[0]->password_admin){
          return array(
                  'result'   => true,
                  'message'  => "Login Berhasil",
                  'type'     => "admin",
                  'data'     => $data[0],
                );
        } else {
          return array(
    							'result'   => false,
                  'message'  => "Password Salah"
    						);
        }
      }
    }
}
?>
