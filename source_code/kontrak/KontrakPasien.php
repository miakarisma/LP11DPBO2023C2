<?php

  interface KontrakPasienView {
      public function tampil();
      public function tampilFormTambahUbah($id);
      public function tambah($data);
      public function ubah($id, $data);
      public function hapus($id);
  }

  interface KontrakPasienPresenter {
      public function prosesDataPasien();
      public function prosesDataPasienById($id);
      public function addDataPasien($data);
      public function editDataPasien($id, $data);
      public function deleteDataPasien($id);
      public function getId($i);
      public function getNik($i);
      public function getNama($i);
      public function getTempat($i);
      public function getTl($i);
      public function getGender($i);
      public function getEmail($i);
      public function getPhone($i);
      public function getSize();
  }
