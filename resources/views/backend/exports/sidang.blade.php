<table>
    <thead>
    <tr>
        <th style="width: 100px;">NIM</th>
        <th style="width: 250px;">Nama Mahasiswa</th>
        <th style="width: 500px;">Judul</th>
        <th style="width: 500px;">Title</th>
        <th style="width: 100px;">PBB 1</th>
        <th style="width: 100px;">PBB 2</th>
        <th style="width: 100px;">PUJ 1</th>
        <th style="width: 100px;">PUJ 2</th>
        <th style="width: 100px;">Tanggal sidang</th>
        <th style="width: 100px;">Jam mulai sidang</th>
        <th style="width: 100px;">Jam selesai sidang</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{ $item->nim }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->judul_indo }}</td>
            <td>{{ $item->judul_inggris }}</td>
            <td>{{ \App\Models\Dosen::where(['id' => $item->pembimbing1_id])->pluck('kode')->first() }}</td>
            <td>{{ \App\Models\Dosen::where(['id' => $item->pembimbing2_id])->pluck('kode')->first() }}</td>
            <td>{{ \App\Models\Dosen::where(['id' => $item->penguji1_id])->pluck('kode')->first() }}</td>
            <td>{{ \App\Models\Dosen::where(['id' => $item->penguji2_id])->pluck('kode')->first() }}</td>
            <td>{{ $item->tanggal_sidang }}</td>
            <td>{{ $item->jam_mulai_sidang }}</td>
            <td>{{ $item->jam_selesai_sidang }}</td>
        </tr>
    @endforeach
    </tbody>
</table>