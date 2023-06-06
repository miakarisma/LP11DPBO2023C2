<?php


include_once("kontrak/KontrakPasien.php");
include_once("presenter/ProsesPasien.php");

class TampilPasien implements KontrakPasienView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getPhone($i) . "</td>
			<td>
				<a class='btn btn-success btn-sm' href='index.php?id_edit=" . $this->prosespasien->getId($i) . "'>Edit</a>
				<a class='btn btn-danger btn-sm' href='index.php?id_hapus=" . $this->prosespasien->getId($i) . "'>Delete</a>
            </td>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function tampilFormTambahUbah($id)
	{
		$tpl = new Template("templates/addeditpasien.html");
        $title = "Create Data Pasien";

		if ($id != null) {
			$this->prosespasien->prosesDataPasienById($id);
			$title = "Edit Data Pasien";
			$tpl->replace("DATA_VAL_NIK", $this->prosespasien->getNik(0));
			$tpl->replace("DATA_VAL_NAMA", $this->prosespasien->getNama(0));
			$tpl->replace("DATA_VAL_TEMPAT", $this->prosespasien->getTempat(0));
			$tpl->replace("DATA_VAL_TL", $this->prosespasien->getTl(0));
			$tpl->replace("DATA_VAL_GENDER", $this->prosespasien->getGender(0));
			$tpl->replace("DATA_VAL_EMAIL", $this->prosespasien->getEmail(0));
			$tpl->replace("DATA_VAL_PHONE", $this->prosespasien->getPhone(0));
			$tpl->replace("DATA_ID", $id);
		}

		$tpl->replace("DATA_TITLE", $title);
        $tpl->write();
	}

	function tambah($data)
	{
		$this->prosespasien->addDataPasien($data);
	}

	function ubah($id, $data)
	{
		$this->prosespasien->editDataPasien($id, $data);
	}

	function hapus($id)
	{
		$this->prosespasien->deleteDataPasien($id);
	}
}
