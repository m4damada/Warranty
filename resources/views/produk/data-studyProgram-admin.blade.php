@extends('master.master-admin')

@section('title')
    Produk | DrArtexFilms
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Produk<h1>
@endsection

@section('menu')
    @include('sidebar')
@endsection

@section('content')
@error('success')
<div class="alert alert-success alert-dismissible fade show">
    <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
    <strong>Sukses!</strong> Data berhasil disimpan.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
    </button>
</div>
@enderror
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Produk</h4>
                    <!-- center modal -->
                    <div>
                        <button class="btn btn-secondary waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                                class="fa fa-print"> </i></button>
                        <button type="button" class="btn btn-hblack mb-4" data-bs-toggle="modal" data-bs-target="#modal_tambah"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Produk</button>
                    </div>
                    <div class="modal fade modal" role="dialog" id="modal_tambah" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="save-produk" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="userid" value="{{ auth()->user()->id}}">
                                        <div class="form-group">
                                            <label for="kode">ID Produk</label>
                                            <input type="text" class="form-control" id="kode"
                                                placeholder="Ketikkan ID produk" name="kode" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="iduser">Nama Produk</label>
                                            <input type="text" class="form-control" id="nama"
                                                placeholder="Ketikkan nama produk" name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="iduser">Kategori Produk</label>
                                            <select name="kategori" id="" class="form-select select2">
                                                <option disabled selected option>Pilih kategori produk</option>
                                            @foreach($kategori as $val)
                                                <option value="{{$val->id}}">{{$val->kategori}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tipe_warranty">Durasi Garansi</label>
                                            <select name="tipe_warranty" id="" class="form-select select2">
                                                <option disabled selected option>Pilih durasi garansi</option>
                                                @foreach($mWarranty as $val)
                                                    <option value="{{$val->id}}">{{$val->tipe}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer border-top-0 d-flex">
                                            <button type="submit" class="btn btn-twhite">Tambah Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
                <div class="card-body" id="cetak">
                    <div class="table-responsive">
                        {{ csrf_field() }}

                        <table id="produk" class="display" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Durasi Garansi</th>
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