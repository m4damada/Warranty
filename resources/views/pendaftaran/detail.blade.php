<form>
    <div class="mb-3">
        <label for="nama" class="form-label">Kode Garansi</label>
        <input type="text" name="nama" class="form-control" id="nama" value="{{ $data['code'] }}" readonly>
    </div>
    <div class="form-row mb-3">
        <div class="col-md-6">
            <label for="nama" class="form-label">Nama Konsumen</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ $data['nama'] }}" readonly>
        </div>
        <div class="col-md-6">
            <label for="tanggal" class="form-label">Tanggal Lahir Konsumen</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $data['tanggal'] ?\Carbon\Carbon::parse($data['tanggal'])->format('Y-m-d') : '' }}" readonly>
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="col-md-6">
            <label for="email" class="form-label">Email Konsumen</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $data['email'] }}" readonly>
        </div>
        <div class="col-md-6">
            <label for="handphone" class="form-label">No. Handphone Konsumen</label>
            <input type="tel" class="form-control" name="handphone" id="handphone" value="{{ $data['handphone'] }}" readonly>
        </div>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Konsumen</label>
        <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $data['alamat'] }}" readonly>
    </div>
    <div class="mb-3">
        <label for="alamat_reseller" class="form-label">Alamat Reseller</label>
        <input type="text" class="form-control" name="alamat_reseller" id="alamat_reseller" value="{{ $data['alamat_reseller'] }}" readonly>
    </div>
    <div class="form-row mb-3">
        <div class="col-md-6">
            <label for="handphone_reseller" class="form-label">No. Handphone Reseller/Distributor</label>
            <input type="tel" class="form-control" name="handphone_reseller" id="handphone_reseller" value="{{ $data['handphone_reseller'] }}" readonly>
        </div>
        <div class="col-md-6">
            <label for="tgl_pemasangan" class="form-label">Tanggal Pemasangan</label>
            <input type="date" class="form-control" name="tgl_pemasangan" id="tgl_pemasangan" value="{{ $data['tanggal'] ? \Carbon\Carbon::parse($data['tgl_pemasangan'])->format('Y-m-d') : '' }}" readonly>
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="col-md-6">
            <label for="merek-dropdown" class="form-label">Merek Mobil</label>
            <select id="merek-dropdown" class="form-control select2" name="merek" disabled>
                <option value=""></option>
                @foreach ($mereks as $m)
                    <option value="{{ $m->id }}" @if(isset($data['merek']) && $data['merek'] == $m->id) selected @endif>
                        {{ $m->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="tipe-dropdown" class="form-label">Tipe Mobil</label>
            <select id="tipe-dropdown" class="form-control select2" name="tipe" disabled>
                <option value=""></option>
                @foreach ($tipes as $m)
                    <option value="{{ $m->id }}" @if(isset($data['tipe']) && $data['tipe'] == $m->id) selected @endif>
                        {{ $m->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="col-md-6">
            <label for="nomor_rangka" class="form-label">Nomor Rangka Kendaraan</label>
            <input type="text" name="nomor_rangka" class="form-control" id="nomor_rangka" value="{{ $data['nomor_rangka'] }}" readonly>
        </div>
        <div class="col-md-6">
            <label for="nomor_plat" class="form-label">Nomor Plat Kendaraan</label>
            <input type="text" name="nomor_plat" class="form-control" id="nomor_plat" value="{{ $data['nomor_plat'] }}" readonly>
        </div>
    </div>
    <div class="mb-3">
        <label for="ppf" class="form-label">PPF</label>
        <input type="text" class="form-control" name="ppf" id="ppf" value="{{ $data['ppf_name'] }}" readonly>
    </div>
    <div class="form-row mb-3">
        <div class="col-md-4">
            <label for="front_window" class="form-label">Kaca Film Depan</label>
            <input type="text" class="form-control" name="front_window" id="front_window" value="{{ $data['front'] }}" readonly>
        </div>
        <div class="col-md-4">
            <label for="side_window" class="form-label">Kaca Film Samping</label>
            <input type="text" class="form-control" name="side_window" id="side_window" value="{{ $data['side'] }}" readonly>
        </div>
        <div class="col-md-4">
            <label for="back_window" class="form-label">Kaca Film Belakang</label>
            <input type="text" class="form-control" name="back_window" id="back_window" value="{{ $data['back'] }}" readonly>
        </div>
    </div>
    <div class="mb-3">
        <label for="panoramic" class="form-label">Panoramic & Rear Protection</label>
        <input type="text" name="panoramic" id="panoramic" class="form-control" value="{{ $data['pano'] }}" readonly>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    </div>
</form>