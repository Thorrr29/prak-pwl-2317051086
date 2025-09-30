@extends('layouts.app')

@section('content')
    <h1 class="text-center my-4">Daftar Pengguna</h1>

    <div class="container">
        <table class="table table-striped table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>NPM</th>
                    <th>KELAS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->npm }}</td>
                        <td>{{ $user->kelas->nama_kelas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
