@include("layout.header")

<h2>Daftar Judul</h2>
<a href="{{ route('judul.create') }}" class="tombol">Tambah Judul</a>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Anime</th>
            <th>Penerbit</th>
            <th>Gambar</th>
            <th>Sinopsis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
       @foreach($juduls as $key => $j)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $j->nama_judul }}</td>
        <td>{{ $j->penerbit ? $j->penerbit->nama_penerbit : '' }}</td>
        <td><img src="{{ asset('images/' . $j->gambar) }}" alt="" width="80"></td>
        <td>{{ $j->sinopsis }}</td>
        <td>
            <a href="{{ route('judul.show', $j->id) }}" class="tombol">Lihat</a>
            <a href="{{ route('judul.edit', $j->id) }}" class="tombol">Edit</a>
            <form action="{{ route('judul.destroy', $j->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="tombol">Hapus</button>
            </form>
        </td>
    </tr>
@endforeach

    </tbody>
</table>

@include("layout.footer")
