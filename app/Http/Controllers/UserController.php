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
        $store = $this->userModel->create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelas_id' => $request->kelas_id
        ]);

        return redirect()->to('/user');
    }
}
