<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $user = $this->userModel->getUser();
        $data = [
            'title' => 'User',
            'user' => $this->userModel->getUser()
        ];
        return view('list_user', $data);
    }

    public function create()
    {
        $kelasmodel = new Kelas();
        $kelas = $kelasmodel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas

        ];
        return view('create_user', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|uuid|exists:kelas,id'
        ]);

        $store = $this->userModel->create([
            'id' => (string) \Illuminate\Support\Str::uuid(),
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelas_id' => $request->kelas_id
        ]);

        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $user = $this->userModel->findOrFail($id);
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas
        ];
        return view('edit_user', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|uuid|exists:kelas,id'
        ]);

        $user = $this->userModel->findOrFail($id);
        $user->update([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelas_id' => $request->kelas_id
        ]);

        return redirect()->to('/user')->with('success', 'Pengguna berhasil diupdate!');
    }

    public function destroy($id)
    {
        $user = $this->userModel->findOrFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'Pengguna berhasil dihapus!');
    }
}
