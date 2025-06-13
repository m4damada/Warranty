<form action="update-tipe" method="POST" enctype="multipart/form-data" id="edit-tipe">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $data['id'] }}">
        <div class="form-group">
            <label for="iduser" style="font-size: 0.875rem;">Tipe Mobil</label>
            <input type="text" class="form-control" id="name" placeholder="Ketikkan tipe mobil" name="name" required value="{{$data['name']}}">
        </div>
        <div class="form-group">
            <label for="iduser" style="font-size: 0.875rem;">Merek Mobil</label>
            <select name="merek" id="tipe_merek_edit" class="form-select select2">
                <option>Pilih merek mobil</option>
                @foreach($merk as $val)
                    <option value="{{$val->id}}" {{ ($val->id == $data['merek_id'])? 'selected' : '' }}>{{$val->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer border-top-0 d-flex">
            <button type="submit" name="add" class="btn btn-twhite">Edit Data</button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function(){
        $('#tipe_merek_edit').select2({
            dropdownParent: $('#edit-tipe')
        });
    });
</script>