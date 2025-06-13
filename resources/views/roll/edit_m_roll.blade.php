<form action="update-m_roll" method="POST" id="form_m_roll">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $data['id'] }}">
        <div class="form-group">
            <label for="roll_name" style="font-size: 0.875rem;">ID Roll</label>
            <input type="text" class="form-control" placeholder="Ketikkan ID roll" id="roll_name" name="roll_name" value="{{ $data['roll_name'] }}" readonly>
        </div>
        <div class="form-group">
            <label for="id_produk" style="font-size: 0.875rem;">Produk</label>
            <select name="id_produk" id="produk_roll_edit" class="form-select select2" required>
                <option disabled selected option>Pilih produk</option>
                @foreach($produk as $val)
                    <option value="{{ $val->id }}" {{ ($data['id_produk'] == $val->id) ? 'selected' : '' }}>{{ $val->nama_produk }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                <input type="checkbox" name="is_aktif" id="is_aktif" value="1" {{ $data['is_aktif'] == 1 ? 'checked' : '' }}>
                <label for="is_aktif" style="font-size: 0.875rem;">Aktif</label>
        </div>
        <div class="modal-footer border-top-0 d-flex">
            <button type="submit" class="btn btn-twhite">Ubah Data</button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function(){
        $('#produk_roll_edit').select2({
            dropdownParent: $('#form_m_roll')
        });
    });
</script>