@extends('master.master-admin')

@section('title')
    Tipe Mobil | DrArtexFilms
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Tipe Mobil<h1>
@endsection

@section('menu')
    @include('sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Tipe Mobil</h4>
                    <!-- center modal -->
                    <div>
                        <button class="btn btn-secondary waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                            class="fa fa-print"> </i></button>
                        <button type="button" class="btn btn-hblack mb-4" data-bs-toggle="modal" data-bs-target="#modalTambah"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Tipe Mobil</button>
                    </div>
                    <div class="modal fade modal" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true" id="modalTambah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Tipe Mobil</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="save-tipe" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="name">Tipe Mobil</label>
                                            <input type="text" class="form-control" id="name" placeholder="Ketikkan tipe mobil" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Merek Mobil</label>
                                            <select name="merek" id="" class="form-select select2">
                                                <option disabled selected option>Pilih merek mobil</option>
                                                @foreach($merk as $val)
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer border-top-0 d-flex">
                                            <button type="submit" name="add" class="btn btn-twhite">Tambah
                                                Data</button>
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
                        <table id="myDatatable" class="display" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tipe</th>
                                    <th>Merek</th>
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