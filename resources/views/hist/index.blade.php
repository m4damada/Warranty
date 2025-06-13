@extends('master.master-admin')

@section('title')
    Histori Sub Roll | DrArtexFilms
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Histori Sub Roll<h1>
@endsection

@section('menu')
    @include('sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Histori Sub Roll</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="cetak">
                        {{ csrf_field() }}
                        <table id="hist_sub_roll" class="display" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Sub Roll</th>
                                    <th>ID Master Roll</th>
                                    <th>Produk</th>
                                    <th>User Input</th>
                                    <th>Tanggal Input</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               <!-- @foreach ($data as $x)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $x->kode_sub_roll ?? '-'}}</td>
                                    <td>{{ $x->roll_name ?? '-'}}</td>
                                    <td>{{ $x->nama_produk ?? '-' }}</td>
                                    <td>{{ $x->user_input ?? '-' }}</td>
                                    <td>{{ $x->tgl_input ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn-xs" title="Detail" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $x->id }}">
                                                <i class="fa fa-regular fa-eye"></i> Lihat
                                            </a>
                                                
                                            {{-- modal detail data --}}
                                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel{{ $x->id }}" aria-hidden="true" id="modalDetail{{ $x->id }}">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Lengkap Histori Sub Roll</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <input type="hidden" name="id" value="{{ $x->id }}">
                                                                <div class="mb-3">
                                                                    <label for="nama" class="form-label">Kode Garansi</label>
                                                                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $x->kode_sub_roll }}" readonly>
                                                                </div>
                                                                <div class="form-row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="nama" class="form-label">Nama Konsumen</label>
                                                                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $x->kode_sub_roll }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="tanggal" class="form-label">Tanggal Lahir Konsumen</label>
                                                                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $x->tanggal ?\Carbon\Carbon::parse($x->tanggal)->format('Y-m-d') : '' }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="email" class="form-label">Email Konsumen</label>
                                                                        <input type="email" class="form-control" name="email" id="email" value="{{ $x->email }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="handphone" class="form-label">No. Handphone Konsumen</label>
                                                                        <input type="tel" class="form-control" name="handphone" id="handphone" value="{{ $x->handphone }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="alamat" class="form-label">Alamat Konsumen</label>
                                                                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $x->alamat }}" readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="alamat_reseller" class="form-label">Alamat Reseller</label>
                                                                    <input type="text" class="form-control" name="alamat_reseller" id="alamat_reseller" value="{{ $x->alamat_reseller }}" readonly>
                                                                </div>
                                                                <div class="form-row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="handphone_reseller" class="form-label">No. Handphone Reseller/Distributor</label>
                                                                        <input type="tel" class="form-control" name="handphone_reseller" id="handphone_reseller" value="{{ $x->handphone_reseller }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="tgl_pemasangan" class="form-label">Tanggal Pemasangan</label>
                                                                        <input type="date" class="form-control" name="tgl_pemasangan" id="tgl_pemasangan" value="{{ $x->tanggal ? \Carbon\Carbon::parse($x->tgl_pemasangan)->format('Y-m-d') : '' }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="nomor_rangka" class="form-label">Nomor Rangka Kendaraan</label>
                                                                        <input type="text" name="nomor_rangka" class="form-control" id="nomor_rangka" value="{{ $x->nomor_rangka }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="nomor_plat" class="form-label">Nomor Plat Kendaraan</label>
                                                                        <input type="text" name="nomor_plat" class="form-control" id="nomor_plat" value="{{ $x->nomor_plat }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="ppf" class="form-label">PPF</label>
                                                                    <input type="text" class="form-control" name="ppf" id="ppf" value="{{ $x->ppf_name }}" readonly>
                                                                </div>
                                                                <div class="form-row mb-3">
                                                                    <div class="col-md-4">
                                                                        <label for="front_window" class="form-label">Kaca Film Depan</label>
                                                                        <input type="text" class="form-control" name="front_window" id="front_window" value="{{ $x->front }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="side_window" class="form-label">Kaca Film Samping</label>
                                                                        <input type="text" class="form-control" name="side_window" id="side_window" value="{{ $x->side }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="back_window" class="form-label">Kaca Film Belakang</label>
                                                                        <input type="text" class="form-control" name="back_window" id="back_window" value="{{ $x->back }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="panoramic" class="form-label">Panoramic & Rear Protection</label>
                                                                    <input type="text" name="panoramic" id="panoramic" class="form-control" value="{{ $x->pano }}" readonly>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection