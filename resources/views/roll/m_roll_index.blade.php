@extends('master.master-admin')

@section('title')
    Master Roll | DrArtexFilms
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Master Roll<h1>
@endsection

@section('menu')
    @include('sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Master Roll</h4>
                    <!-- center modal -->
                    <div>
                        <button class="btn btn-secondary waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                            class="fa fa-print"> </i></button>
                        <button type="button" data-url="generate-roll" data-type="roll" data-get_produk="get-data-produk"
                            class="btn btn-hblack waves-effect waves-light mb-4 generate_kode" id="generate_kode"><i class="mdi mdi-shape-circle-plus me-1"></i>Generate Kode</button>
                        <button type="button" class="btn btn-hblack mb-4" data-bs-toggle="modal" data-bs-target="#modalTambah"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Master Roll</button>
                    </div>
                    <div class="modal fade modal" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true" id="modalTambah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Master Roll</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('data-save_m_roll')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="roll_name">ID Roll</label>
                                            <input type="text" class="form-control" placeholder="Ketikkan ID roll" id="roll_name" name="roll_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_produk">Produk</label>
                                            <select name="id_produk" id="" class="form-select select2" required>
                                                <option disabled selected option>Pilih produk</option>
                                                @foreach($produk as $val)
                                                    <option value="{{$val->id}}">{{$val->nama_produk}}</option>
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
                <div class="card-body">
                    <div class="table-responsive" id="cetak">
                        {{ csrf_field() }}
                        <table id="m_roll" class="display" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Roll</th>
                                    <th>Produk</th>
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