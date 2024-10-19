<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
  // Halaman Data Mahasiswa
  public function index(){
    return view('admin.mahasiswa.index');
  }
  
  // Halaman Tambah Data Mahasiswa
  public function create(){
    return view('admin.mahasiswa.create');
  }
  
  // Halaman Simpan Data Mahasiswa
  public function store(Request $request){
    return redirect('/admin/mahasiswa');
  }
  
  // Halaman Edit Data Mahasiswa
  public function edit($id){
    return view('admin.mahasiswa.edit');
  }

  // Fungsi Update Data Mahasiswa
  public function update(Request $request, $id){
    return redirect('/admin/mahasiswa');
  }

  // Fungsi Hapus Data Mahasiswa
  public function delete($id){
    return view('/admin/mahasiswa');
  }
}
