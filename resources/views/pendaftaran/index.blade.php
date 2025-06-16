@extends('master.master-admin')

@section('title')
    Histori Pendaftaran | DrArtexFilms
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Histori Pendaftaran Garansi<h1>
@endsection

@section('menu')
    @include('sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pendaftaran Garansi</h4>
                    <!-- center modal -->
                    <div>
                        <button class="btn btn-secondary waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                            class="fa fa-print"> </i></button>
                        <button type="button" data-url="generate-kode" class="btn btn-hblack waves-effect waves-light mb-4 generate_kode" id="" title="Generate Kode"><i class="mdi mdi-shape-circle-plus me-1"></i>Generate Kode</button>
                        <button type="button" class="btn btn-hblack mb-4" data-bs-toggle="modal" data-bs-target="#modalTambah"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Pendaftaran Garansi</button>
                    </div>
                    <div class="modal fade modal" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true" id="modalTambah">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Pendaftaran Garansi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="save-pendaftaran" method="POST" enctype="multipart/form-data">
                                        <div class="form-row label-font">
                                            <div class="form-group col-md-6">
                                                <label for="">Nama Konsumen</label>
                                                <input type="text" name="nama" class="form-control" id="" placeholder="Ketikkan nama lengkap konsumen" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Tanggal Lahir Konsumen</label>
                                                <input type="date" class="form-control" name="tanggal" id="" placeholder="Ketikkan tanggal lahir konsumen" required>
                                            </div>
                                        </div>
                                        <div class="form-row label-font">
                                            <div class="form-group col-md-6">
                                                <label for="">Email Konsumen</label>
                                                <input type="email" class="form-control" name="email" id="" placeholder="Ketikkan email konsumen" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">No. Handphone Konsumen</label>
                                                <input type="tel" class="form-control" name="handphone" id="" placeholder="Ketikkan no. hp konsumen" required>
                                            </div>
                                        </div>
                                        <div class="form-group label-font">
                                            <label for="">Alamat Konsumen</label>
                                            <input type="text" class="form-control" name="alamat" id="" placeholder="Ketikkan alamat lengkap konsumen" required>
                                        </div>
                                        <div class="form-group label-font">
                                            <label for="" class="form-label label-font">Merek Mobil</label>
                                            <select id="" class="form-control select2" name="merk">
                                                <option value="" disabled selected option>-- Pilih merek mobil --</option>
                                                @foreach ($mereks as $m)
                                                    <option value="{{ $m->id }}">{{ $m->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group label-font">
                                            <label for="" class="form-label label-font">Tipe Mobil</label>
                                            <select id="" class="form-control select2" name="tipe">
                                                <option value="" disabled selected option>-- Pilih tipe mobil --</option>
                                                @foreach ($tipes as $m)
                                                    <option value="{{ $m->id }}">{{ $m->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-row label-font">
                                            <div class="form-group col-md-6">
                                                <label for="">Nomor Rangka Kendaraan</label>
                                                <input type="text" name="nomor_rangka" class="form-control" id="" placeholder="Masukkan nomor rangka kendaraan" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Nomor Plat Kendaraan</label>
                                                <input type="text" name="nomor_plat" class="form-control" id="" placeholder="Masukkan nomor plat kendaraan" required>
                                            </div>
                                        </div>
                                        <div class="form-group label-font">
                                            <label for="" class="form-label label-font">Paint Protection Film</label>
                                            <select id="" class="form-control select2" name="ppf">
                                                <option value="" disabled selected option>-- Pilih PPF --</option>
                                                @foreach ($res_ppf as $val)
                                                    @if($val->is_pakai != 1)
                                                        <option value="{{ $val->id_sub_roll }}">{{ $val->kode_sub_roll }} - {{$val->nama_produk}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group label-font">
                                            <label for="" class="form-label label-font">Kaca Film Depan</label>
                                            <select id="" class="form-control select2" name="front_window">
                                                <option value="" disabled selected option>-- Pilih kaca film depan --</option>
                                                @foreach ($res_window as $m)
                                                    @if($m->is_pakai != 1)
                                                        <option value="{{ $m->id_sub_roll }}">{{ $m->kode_sub_roll }} - {{ $m->nama_produk }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group label-font">
                                            <label for="" class="form-label label-font">Kaca Film Samping</label>
                                            <select id="" class="form-control select2" name="side_window">
                                                <option value="" disabled selected option>-- Pilih kaca film samping --</option>
                                                @foreach ($res_window as $m)
                                                    @if($m->is_pakai != 1)
                                                        <option value="{{ $m->id_sub_roll }}">{{ $m->kode_sub_roll }} - {{ $m->nama_produk }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group label-font">
                                            <label for="" class="form-label label-font">Kaca Film Belakang</label>
                                            <select id="" class="form-control select2" name="back_window">
                                                <option value="" disabled selected option>-- Pilih kaca film belakang --</option>
                                                @foreach ($res_window as $m)
                                                    @if($m->is_pakai != 1)
                                                        <option value="{{ $m->id_sub_roll }}">{{ $m->kode_sub_roll }} - {{ $m->nama_produk }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group label-font">
                                            <label for="" class="form-label label-font">Panoramic & Rear Protection</label>
                                            <select id="" class="form-control select2" name="panoramic">
                                                <option value="" disabled selected option>-- Pilih Panoramic --</option>
                                                @foreach ($res_panoramic as $m)
                                                    @if($m->is_pakai != 1)
                                                        <option value="{{ $m->id_sub_roll }}">{{ $m->kode_sub_roll }} - {{ $m->nama_produk }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer border-top-0 d-flex">
                                            <button type="submit" name="add" class="btn btn-twhite">Tambah Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="cetak">
                        {{ csrf_field() }}
                        <table id="pendaftaran" class="display" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Garansi</th>
                                    <th>Nama Pemilik</th>
                                    <th>Merek Mobil</th>
                                    <th>Jenis Mobil</th>
                                    <th>Nomor Rangka</th>
                                    <th>Nomor Plat</th>
                                    <th>Dealer</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection