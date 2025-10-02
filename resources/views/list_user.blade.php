@extends('layouts.app')

@section('content')
    {{-- @include('components.navbar') --}}

    <div style="max-width:900px; margin:2rem auto; background:#fff; border-radius:8px; box-shadow:0 2px 8px #ccc; padding:2rem;">
        <h1 style="text-align:center; color:#007bff; margin-bottom:2rem;">Daftar Pengguna</h1>
        <div style="text-align:right; margin-bottom:1rem;">
            <a href="{{ route('user_create') }}" class="btn btn-success" style="background:#28a745; color:white; padding:0.5rem 1.2rem; border-radius:4px; text-decoration:none;">+ Tambah User</a>
        </div>

        @include('components.user-table', ['user' => $user])
    </div>

    {{-- @include('components.footer') --}}
@endsection
