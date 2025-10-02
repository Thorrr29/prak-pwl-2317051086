<table style="width:100%; border-collapse:collapse; box-shadow:0 2px 8px #ccc;">
    <thead style="background:#5900ff; color:white;">
        <tr>
            <th style="padding:8px;">ID</th>
            <th style="padding:8px;">NAMA</th>
            <th style="padding:8px;">NPM</th>
            <th style="padding:8px;">KELAS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $user)
            <tr style="background:{{ $loop->even ? '#f2f2f2' : '#fff' }};">
                <td style="padding:8px;">{{ $user->id }}</td>
                <td style="padding:8px;">{{ $user->nama }}</td>
                <td style="padding:8px;">{{ $user->npm }}</td>
                <td style="padding:8px;">{{ $user->kelas->nama_kelas }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
