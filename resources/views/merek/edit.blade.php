<form action="update-merek" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $data['id'] }}">
    <div class="form-group">
        <div class="row">
            <div class="col-xl-12">
                <label for="iduser" style="font-size: 0.875rem;">Merek Mobil</label>
                <input type="text" class="form-control" id="name" placeholder="Ketikkan merek mobil" name="name" required value="{{$data['name']}}">
            </div>
        </div>
    </div>
    <div class="modal-footer border-top-0 d-flex">
        <button type="submit" name="add" class="btn btn-twhite">Edit Data</button>
    </div>
</form>