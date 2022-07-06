<?php

Class Select_model extends CI_Model
{

function __construct(){

parent::__construct();

}


function petugas(){


$this->db->order_by('id_petugas');
$petugas = $this->db->get('petugas');


return $petugas->result_array();


}
function siswa(){

	$this->db->order_by('nisn');
	$siswa = $this->db->get('siswa');

	return $siswa->result_array();
}
function spp(){

	$this->db->order_by('id_spp');
	$siswa = $this->db->get('spp');

	return $siswa->result_array();
}
function kelas(){

	$this->db->order_by('id_kelas');
	$siswa = $this->db->get('kelas');

	return $siswa->result_array();
}
}
