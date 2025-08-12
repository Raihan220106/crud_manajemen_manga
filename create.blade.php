@include('layout.header')

<h2>Buat Judul</h2>
<form action="{{ route('judul.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Judul Anime:</label>
        <input type="text" name="nama_judul" value="{{ old('nama_judul') }}" placeholder="Masukkan judul anime">
        @error('nama_judul') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Penerbit:</label>
        <select name="nama_penerbit">
            <option value="">-- Pilih Penerbit --</option>
            @foreach($penerbit as $p)
                <option value="{{ $p->id }}" {{ old('nama_penerbit') == $p->id ? 'selected' : '' }}>
                    {{ $p->nama_penerbit }}
                </option>
            @endforeach
        </select>
        @error('nama_penerbit') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Gambar:</label>
        <input type="file" name="gambar">
        @error('gambar') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Sinopsis:</label>
        <textarea name="sinopsis" placeholder="Masukkan sinopsis">{{ old('sinopsis') }}</textarea>
        @error('sinopsis') <div class="error">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="tombol">Submit</button>
</form>

@include('layout.footer')
