<?php

class Pengguna extends CI_Model{

public $idUser;
public $namaUser;
public $emailUser;
public $password;
public $createdAt;
public $updatedAt;


	public function checkDataUser($emailUser)
	{
		$query=$this->db->query("select * from pengguna where EMAIL_USER='$emailUser'");
		return $query->num_rows()>0;
	}

    public function submitDataUser($namaUser,$emailUser,$password)
    {
		$query=$this->db->query("insert into pengguna (NAMA_USER, EMAIL_USER, PASSWORD_USER) values ('$namaUser','$emailUser','$password')");
	}

	public function checkLogin($emailUser,$password){
		$query=$this->db->query("select * from pengguna where EMAIL_USER='$emailUser' and PASSWORD_USER='$password';");
		if($query->num_rows()>0){
			return $query->row();
		} else {
			return false;
		}
	}
}
?>
