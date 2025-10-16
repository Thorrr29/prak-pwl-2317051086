<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    public function index(){
        $data = [
            'title' => 'List Mata Kuliah',
            'mks' => MataKuliah::all(),
        ];
        return view('list_mk', $data);
    }

    public function create(){
        return view('create_mk', ['title' => 'Create Mata Kuliah']);
    }

    public function store(Request $request){

        MataKuliah::create([
            'nama_mk' => $request->input('nama_mk'),
            'sks' => $request->input('sks'),
        ]);

        return redirect('/mata_kuliah')->with('success', 'Mata Kuliah berhasil ditambahkan!');
    }

    public function edit($id){
        $mk = MataKuliah::findOrFail($id);
        return view('edit_mk', ['title' => 'Edit Mata Kuliah', 'mk' => $mk]);
    }

    public function update(Request $request, $id){
        request()->validate([
            'nama_mk' => 'required',
            'sks' => 'required|integer|min:1|max:6',
        ]);
        try {
            $mk = MataKuliah::findOrFail($id);
            $mk->update($request->only(['nama_mk','sks']));
            return redirect('/mata_kuliah')->with('success', 'Mata Kuliah berhasil diupdate!');
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Gagal mengupdate: '.$e->getMessage());
        }
    }

    public function destroy($id){
         try {
            $mk = MataKuliah::findOrFail($id);
            $mk->delete();
            return redirect('/mata_kuliah')->with('success', 'Mata Kuliah berhasil dihapus!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal menghapus: '.$e->getMessage());
        }
    }

}
