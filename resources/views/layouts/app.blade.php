<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title ?? 'Document' }}</title>

  {{-- Bootstrap CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  {{-- Bootstrap Icons (untuk tombol) --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <style>
    body { margin:0; min-height:100vh; display:flex; flex-direction:column; }
    main { flex:1; }

    /* === Tombol kece === */
    .btn-edit{
      background:linear-gradient(135deg,#6a11cb,#2575fc);
      color:#fff; border:none; border-radius:14px; padding:.55rem .9rem;
      box-shadow:0 6px 18px rgba(37,117,252,.25);
      transition:transform .15s, box-shadow .15s, filter .15s;
    }
    .btn-edit:hover{ transform:translateY(-1px); box-shadow:0 10px 24px rgba(37,117,252,.35); color:#fff; }
    .btn-delete{
      background:rgba(220,53,69,.08); color:#dc3545; border:1px solid rgba(220,53,69,.45);
      border-radius:14px; padding:.55rem .9rem; backdrop-filter:blur(4px);
      transition:transform .15s, box-shadow .15s, background .15s, color .15s;
    }
    .btn-delete:hover{ background:#dc3545; color:#fff; box-shadow:0 10px 24px rgba(220,53,69,.35); transform:translateY(-1px); }
    .btn .spinner-border{ width:1rem; height:1rem; border-width:.15rem; }
  </style>
</head>
<body>
  @include('components.navbar')

  <main class="container my-5">
    @yield('content')
  </main>

  @include('components.footer')

  {{-- Bootstrap Bundle (FIX: tanpa spasi & integrity benar) --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
          crossorigin="anonymous"></script>

  {{-- SweetAlert2 untuk toast & konfirmasi delete --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    // Inisialisasi tooltip (kalau dipakai)
    document.addEventListener('DOMContentLoaded', () => {
      const t = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      t.map(el => new bootstrap.Tooltip(el));
    });

    // Delegasi konfirmasi Delete
    document.addEventListener('click', (e) => {
      const btn = e.target.closest('.btn-delete[data-delete-url]');
      if (!btn) return;
      e.preventDefault();

      const url  = btn.getAttribute('data-delete-url');
      const nama = btn.getAttribute('data-nama') || 'data ini';

      Swal.fire({
        title: 'Hapus?',
        html: `Anda akan menghapus <b>${nama}</b>. Tindakan ini tidak dapat dibatalkan.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc3545'
      }).then(res => {
        if (res.isConfirmed) {
          const f = document.createElement('form');
          f.method = 'POST'; f.action = url;
          f.innerHTML = `@csrf @method('DELETE')`;
          document.body.appendChild(f); f.submit();
        }
      });
    });

    // Toast notifikasi dari session & validasi
    @if (session('success'))
      Swal.fire({ toast:true, position:'top-end', icon:'success', title:@json(session('success')), showConfirmButton:false, timer:2500, timerProgressBar:true });
    @endif
    @if (session('error'))
      Swal.fire({ toast:true, position:'top-end', icon:'error', title:@json(session('error')), showConfirmButton:false, timer:3000, timerProgressBar:true });
    @endif
    @if ($errors->any())
      Swal.fire({ icon:'error', title:'Validasi gagal', html:`{!! implode('<br>', $errors->all()) !!}` });
    @endif
  </script>
</body>
</html>
