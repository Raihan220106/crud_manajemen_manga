@include('layout.header')
        <h2>Edit Penerbit</h2>
        <form action="{{ route('penerbit.update',$penerbit->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="" >Nama Penerbit:</label>
                <input type="text" name="nama_penerbit" id="" value="{{ $penerbit->nama_penerbit }}" >
            </div>
            <button type="submit" class="tombol">Update</button>
        </form>
      
        
@include('layout.footer')        
      