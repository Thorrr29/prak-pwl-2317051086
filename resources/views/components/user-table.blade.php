<table style="width:100%; border-collapse:collapse; box-shadow:0 2px 8px #ccc;">
    <thead style="background:#007bff; color:white;">
        <tr>
            <th style="padding:8px;">ID</th>
            <th style="padding:8px;">NAMA</th>
            <th style="padding:8px;">NPM</th>
            <th style="padding:8px;">KELAS</th>
            <th style="padding:8px;">AKSI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $u)
            <tr style="background:{{ $loop->even ? '#f2f2f2' : '#fff' }};">
                <td style="padding:8px;">{{ $u->id }}</td>
                <td style="padding:8px;">{{ $u->nama }}</td>
                <td style="padding:8px;">{{ $u->npm }}</td>
                <td style="padding:8px;">{{ $u->nama_kelas }}</td>
                <td style="padding:8px;">
                    <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning btn-sm" style="background:#ffc107; color:black; border:none; padding:0.3rem 0.6rem; border-radius:4px; text-decoration:none; margin-right:0.5rem;">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-delete-url="{{ route('user.destroy', $u->id) }}" data-nama="{{ $u->nama }}" style="background:#dc3545; color:white; border:none; padding:0.3rem 0.6rem; border-radius:4px;">Hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
