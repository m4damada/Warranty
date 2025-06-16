<form action="update-pendaftaran" method="POST" enctype="multipart/form-data" id="edit_pendaftaran">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $data['id'] }}">
    <div class="form-row label-font">
        <div class="form-group col-md-12">
            <label for="code" class="form-label">Kode Garansi</label>
            <input type="text" name="code" class="form-control" id="code" value="{{ $data['code'] }}" readonly>
        </div>
    </div>
    <div class="form-row label-font">
        <div class="form-group col-md-6">
            <label for="">Nama Konsumen</label>
            <input type="text" name="nama" class="form-control" id="" placeholder="Masukkan Nama Lengkap Konsumen" value="{{$data['nama']}}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">Tanggal Lahir Konsumen</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="dd-mm-YYYY" value="{{ $data['tanggal'] ? \Carbon\Carbon::parse($data['tanggal'])->format('Y-m-d') : '' }}" required>
        </div>
    </div>
    <div class="form-row label-font">
        <div class="form-group col-md-6">
            <label for="">Email Konsumen</label>
            <input type="email" class="form-control" name="email" id="" placeholder="Masukkan Email Konsumen" value="{{$data['email']}}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">No. Handphone Konsumen</label>
            <input type="tel" class="form-control" name="handphone" id="" placeholder="Masukkan No. HP Konsumen" value="{{$data['handphone']}}" required>
        </div>
    </div>
    <div class="form-group label-font">
        <label for="">Alamat Konsumen</label>
        <input type="text" class="form-control" name="alamat" id="" placeholder="Masukkan Alamat Lengkap Konsumen" value="{{$data['alamat']}}" required>
    </div>
    <div class="form-group label-font">
        <label for="">Nama Dealer</label>
        <input type="text" class="form-control" name="dealer" id="" placeholder="Masukkan Nama Dealer" value="{{$data['dealer']}}" required>
    </div>
    <div class="form-group label-font">
        <label for="">Alamat Reseller</label>
        <input type="text" class="form-control" name="alamat_reseller" id="" placeholder="Masukkan Alamat Lengkap Reseller" value="{{$data['alamat_reseller']}}" required>
    </div>
    <div class="form-row label-font">
        <div class="form-group col-md-6">
            <label for="">No. Handphone Reseller</label>
            <input type="tel" class="form-control" name="handphone_reseller" id="" placeholder="Masukkan No. HP Reseller" value="{{$data['handphone_reseller']}}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">Tanggal Pemasangan</label>
            <input type="date" class="form-control" name="tgl_pemasangan" placeholder="dd-mm-YYYY" value="{{ $data['tanggal'] ? \Carbon\Carbon::parse($data['tgl_pemasangan'])->format('Y-m-d') : '' }}" required>
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label label-font">Merek Mobil</label>
        <select id="" class="form-control select2" name="merek">
            <option value="" disabled selected option>-- Pilih Merek Mobil --</option>
            @foreach ($mereks as $m)
            <option value="{{$m->id}}" @if(isset($data['merek']) && $data['merek'] == $m->id) selected @endif>
                {{$m->name}}
            </option>
            @endforeach
        </select>
        <br>
        <label for="" class="form-label label-font">Tipe Mobil</label>
        <select id="" class="form-control select2" name="tipe">
        <option value="" disabled selected option>-- Pilih Tipe Mobil --</option>
            @foreach ($tipes as $m)
            <option value="{{$m->id}}" @if(isset($data['tipe']) && $data['tipe'] == $m->id) selected @endif>
                {{$m->name}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-row label-font">
        <div class="form-group col-md-6">
            <label for="">Nomor Rangka Kendaraan</label>
            <input type="text" name="nomor_rangka" class="form-control" id="" placeholder="Masukkan Nomor Rangka" value="{{$data['nomor_rangka']}}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">Nomor Plat Kendaraan</label>
            <input type="text" name="nomor_plat" class="form-control" id="" placeholder="Masukkan Nomor Plat" value="{{$data['nomor_plat']}}" required>
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label label-font">PPF</label>
        <select id="" class="form-control select2" name="ppf">
            <option value="" disabled selected option>-- Pilih PPF --</option>
            @foreach ($res_ppf as $val)
            <option value="{{$val->id_sub_roll}}" {{ ($val->id_sub_roll == $data['ppf'])? 'selected' : '' }}>
                {{$val->kode_sub_roll}} - {{$val->nama_produk}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="front_window" class="form-label label-font">Kaca Film Depan</label>
        <select data-id="front_window_{{$data['id']}}" class="form-control select2 window" name="front_window">
            <option value="" disabled selected>-- Pilih Kaca Film --</option>
            @foreach ($res_window as $m)
            <option value="{{$m->id_sub_roll}}" {{ ($m->id_sub_roll == $data['front_window'])? 'selected' : '' }}>
                {{$m->kode_sub_roll}} - {{ $m->nama_produk }}
            </option>
            @endforeach
        </select>
        <input type="hidden" name="front_window" id="front_window_{{$data['id']}}_hidden" value="{{$data['front_window']}}">
        <br>

        <label for="side_window" class="form-label label-font">Kaca Film Samping</label>
        <select data-id="side_window_{{$data['id']}}" class="form-control select2 window" name="side_window">
            <option value="" disabled selected>-- Pilih Kaca Film --</option>
            @foreach ($res_window as $m)
            <option value="{{$m->id_sub_roll}}" {{ ($m->id_sub_roll == $data['side_window'])? 'selected' : '' }}>
                {{$m->kode_sub_roll}} - {{ $m->nama_produk }}
            </option>
            @endforeach
        </select>
        <input type="hidden" name="side_window" id="side_window_{{$data['id']}}_hidden" value="{{$data['side_window']}}">
        <br>

        <label for="back_window" class="form-label label-font">Kaca Film Belakang</label>
        <select data-id="back_window_{{$data['id']}}" class="form-control select2 window" name="back_window">
            <option value="" disabled selected>-- Pilih Kaca Film --</option>
            @foreach ($res_window as $m)
            <option value="{{$m->id_sub_roll}}" {{ ($m->id_sub_roll == $data['back_window'])? 'selected' : '' }}>
                {{$m->kode_sub_roll}} - {{ $m->nama_produk }}
            </option>
            @endforeach
        </select>
        <input type="hidden" name="back_window" id="back_window_{{$data['id']}}_hidden" value="{{$data['back_window']}}">
        <br>
        <label for="" class="form-label label-font">Panoramic & Rear Protection</label>
        <select id="" class="form-control select2" name="panoramic">
            <option value="" disabled selected option>-- Pilih Kaca Film --</option>
            @foreach ($res_panoramic as $m)
            <option value="{{$m->id_sub_roll}}" {{ ($m->id_sub_roll == $data['panoramic'])? 'selected' : '' }}>
                {{$m->kode_sub_roll}} - {{ $m->nama_produk }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-secondary">Edit Data</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $('.select2').select2({
            dropdownParent: $('#edit_pendaftaran')
        });
    });
</script>