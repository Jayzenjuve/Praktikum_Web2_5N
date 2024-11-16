<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
  // Halaman Data Mahasiswa
  public function index(Request $request)
  {
    $request -> flash();
    $mahasiswa = Mahasiswa::query();

    if(isset($request -> keyword)){
      $mahasiswa = $mahasiswa -> where('nama','LIKE',"%{$request -> keyword}%") 
                              -> orWhere('npm','LIKE',"%{$request -> keyword}%") 
                              -> orWhere('jurusan','LIKE',"%{$request -> keyword}%");
    }
    $mahasiswa = $mahasiswa -> get();
    return view('admin.mahasiswa.index', compact('mahasiswa'));
  }

  // Halaman Tambah Data Mahasiswa
  public function create()
  {
    return view('admin.mahasiswa.create');
  }

  // Halaman Simpan Data Mahasiswa
  public function store(Request $request)
  {
    $input = $request -> all();

    if ($request -> foto) {
      $input['foto'] = $request -> foto -> getClientOriginalName();
      $request -> file('foto') -> move('storage/mahasiswa', $input['foto']);
    }

    Mahasiswa::create($input);


    return redirect('/admin/mahasiswa');
  }

  // Halaman Edit Data Mahasiswa
  public function edit($id)
  {
    $mahasiswa = Mahasiswa::findOrFail($id);
    return view('admin.mahasiswa.edit', compact('mahasiswa'));
  }

  // Fungsi Update Data Mahasiswa
  public function update(Request $request, $id)
  {
    $mahasiswa = Mahasiswa::findOrFail($id);
    $input = $request -> all();

    if ($request -> foto){
      $input['foto'] = $request -> foto -> getClientOriginalName();
      $request -> file('foto') -> move('storage/mahasiswa', $input['foto']);
    }
    $mahasiswa -> update($input);
    return redirect() -> route('mahasiswa.index');
  }
  // Fungsi Hapus Data Mahasiswa
  public function delete($id)
  {
    $mahasiswa = Mahasiswa::find($id);
    $mahasiswa -> delete();

    return redirect() -> route('mahasiswa.index');
  }

  public function print()
  {
    $mahasiswa = Mahasiswa::all();
    return view('admin.mahasiswa.print', compact('mahasiswa'));
  }
}
