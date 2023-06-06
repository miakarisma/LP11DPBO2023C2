<?php
/*
Saya Mia Karisma Haq NIM [2102165] mengerjakan soal Latihan Praktikum-11 dalam mata kuliah DPBO 
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin
*/

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");

$tp = new TampilPasien();

if (isset($_POST['submit'])) {
    if ($_GET['id_edit'] > 0) {
        $id = $_GET['id_edit'];
        $tp->ubah($id, $_POST);
    }
    else {
        //memanggil add
        $tp->tambah($_POST);
    }
} 
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $tp->hapus($id);
}
else if (isset($_GET['add']))
{
    $tp->tampilFormTambahUbah(null);
}
else if (!empty($_GET['id_edit']))
{
    $id = $_GET['id_edit'];
    $tp->tampilFormTambahUbah($id);
} 
else 
{
    $tp->tampil();
}
