@extends('master.master-admin')

@section('title')
    Master Garansi | DrArtexFilms
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Master Garansi<h1>
@endsection

@section('menu')
    @include('sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Master Garansi</h4>
                    <!-- center modal -->
                    <div>
                        <button class="btn btn-secondary waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                            class="fa fa-print"> </i></button>
                        <button type="button" class="btn btn-hblack mb-4" data-bs-toggle="modal" data-bs-target="#modalTambah"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Master Garansi</button>
                    </div>
                    <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true" id="modalTambah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Master Garansi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="save-m_warranty" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="name">Nama Garansi</label>
                                            <input type="text" class="form-control" placeholder="Ketikkan nama garansi" name="tipe" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Durasi Garansi</label>
                                            <input type="number" class="form-control number" placeholder="Ketikkan durasi garansi" name="tahun" required>
                                        </div>
                                        <div class="modal-footer border-top-0 d-flex">
                                            <button type="submit" class="btn btn-twhite">Tambah
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
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Garansi</th>
                                    <th>Durasi Garansi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $x)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td>{{ $x->tipe }}</td>
                                    <td>{{ $x->tahun_berlaku }} Tahun</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-secondary shadow btn-xs sharp me-1" title="Edit" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $x->id }}"><i class="fa fa-pencil-alt"></i></a>
                                            <!-- <a class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash" data-bs-toggle="modal" data-bs-target=".delete{{ $x->id }}"></i></a> -->
                                            <a href="delete-m_warranty/{{$x->id}}" data-name="{{$x->tipe}}" class="btn btn-danger shadow btn-xs sharp btn-delete"><i class="fa fa-trash"></i></a>
                                            
                                            <!-- START MODAL EDIT -->
                                            <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                                                aria-hidden="true" id="modalEdit{{ $x->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Master Garansi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="update-m_warranty" method="POST" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id" value="{{ $x->id }}">
                                                                <div class="form-group">
                                                                    <label for="iduser" style="font-size: 0.875rem;">Nama Garansi</label>
                                                                    <input type="text" class="form-control" placeholder="Ketikkan nama garansi" name="tipe" required value="{{ $x->tipe }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name" style="font-size: 0.875rem;">Durasi Garansi</label>
                                                                    <input type="number" class="form-control number" placeholder="Ketikkan durasi garansi" name="tahun" required value="{{ $x->tahun_berlaku }}">
                                                                </div>
                                                                <div class="modal-footer border-top-0 d-flex">
                                                                    <button type="submit" class="btn btn-twhite">Ubah Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            {{-- modal delete --}}
                                            <div class="modal fade delete{{ $x->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center"><i
                                                                class="fa fa-trash"></i><br> Apakah anda yakin ingin
                                                            menghapus data ini?<br> {{ $x->tipe }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Batalkan</button>
                                                            <a href="{{ route('delete-m_warranty', $x->id) }}">
                                                                <button type="submit" class="btn btn-danger shadow">
                                                                    Ya, Hapus Data!
                                                                </button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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