@extends('layouts.app')

@section('content')
    {{-- @include('components.navbar') --}}

    <div style="max-width:600px; margin:2rem auto; background:#fff; border-radius:8px; box-shadow:0 2px 8px #ccc; padding:2rem;">
        <h2 style="text-align:center; color:#007bff;">Tambah Pengguna Baru</h2>
        <form action="{{ route('user_store') }}" method="POST" style="margin-top:2rem;">
            @csrf
            <div style="margin-bottom:1rem;">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div style="margin-bottom:1rem;">
                <label for="npm">NPM</label>
                <input type="text" name="npm" id="npm" class="form-control" required>
            </div>
            <div style="margin-bottom:1rem;">
                <label for="kelas_id">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-control" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="background:#007bff; color:white; border:none; padding:0.5rem 1.5rem; border-radius:4px;">Simpan</button>
        </form>
    </div>

    {{-- @include('components.footer') --}}
@endsection

