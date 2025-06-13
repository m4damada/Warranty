<form action="update-produk" method="POST" enctype="multipart/form-data" id="edit_produk">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $data['id'] }}">
    <input type="hidden" name="userid" value="{{ auth()->user()->id}}">
    <div class="form-group">
        <label for="kode">ID Produk</label>
        <input type="text" class="form-control" id="kode"
            placeholder="Ketikkan ID produk" name="kode" value="{{ $data['id_produk'] }}" required>
    </div>
    <div class="form-group">
        <label for="iduser">Nama Produk</label>
        <input type="text" class="form-control" id="nama"
            placeholder="Ketikkan nama produk" name="nama" value="{{ $data['nama_produk'] }}" required>
    </div>
    <div class="form-group">
        <label for="iduser">Kategori Produk</label>
        <select name="kategori" id="" class="form-select sel2">
            <option disabled selected option>Pilih kategori produk</option>
        @foreach($kategori as $val)
            <option value="{{$val->id}}" {{ ($data['kategori_produk'] == $val->id) ? 'selected' : '' }}>{{$val->kategori}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="tipe_warranty">Durasi Garansi</label>
        <select name="tipe_warranty" id="" class="form-select sel2">
            <option disabled selected option>Pilih durasi garansi</option>
            @foreach($mWarranty as $val)
                <option value="{{$val->id}}" {{ ($data['tipe_warranty'] == $val->id) ? 'selected' : '' }}>{{$val->tipe}}</option>
            @endforeach
        </select>
    </div>
    <div class="modal-footer border-top-0 d-flex">
        <button type="submit" class="btn btn-twhite">Edit Data</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('.sel2').select2({
            dropdownParent: $('#edit_produk')
        });
    });
</script>