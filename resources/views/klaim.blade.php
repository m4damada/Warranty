<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content=""E-Warranty">
    <meta property="og:title" content=""E-Warranty">
    <meta property="og:description" content=""E-Warranty">

    <!-- PAGE TITLE HERE -->
    <title>Claim Warranty | DrArtexFilms</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <style>
        
        .select2-selection--single {
            height: calc(1.5em + .75rem + 2px) !important;
            padding: .255rem .65rem !important;
        }
        
        .select2-selection__arrow {
            height: calc(1.5em + .75rem + 2px) !important;
        }
        
        .select2-selection__rendered {
            color: #59626A !important;
        }
        
        .btn-twhite {
            background-color: #dc3545 !important;
            color: #fff !important;
            margin: 0rem !important;
            border-radius: 7px !important;
        }
        
        .modal-footer {
            padding: 0px !important;
        }
        
        img {
            height: 276px; 
            width: 100%;
            object-fit: cover;
        }

        .label-font {
            font-size: 13px;
        }

        .container1 {
            width: 900px;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        
        .text-mask {
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0, 0.4); 
            color: white;
            font-weight: bold;
            border: 0px solid;

            /* now center the mask*/
            position: absolute;
            top: 131px;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 100%;
            padding: 117px;
            text-align: center;
        }

        @media only screen and (max-width: 768px) {
            img {
                height: 212px; 
                width: 100%;
                object-fit: cover;
            }

            .text-mask {
                background-color: rgb(0,0,0); 
                background-color: rgba(0,0,0, 0.4); 
                color: white;
                font-weight: bold;
                border: 0px solid;

                /* now center the mask*/
                position: absolute;
                top: 106px;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 2;
                width: 100%;
                padding: 84px;
                text-align: center;
            }

            .header-bold {
                font-size:30px;
            }

            .container1 {
                width: 361px;
                padding-right: 15px;
                padding-left: 15px;
            }
        }
    </style>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="https://drartexfilms.com/wp-content/uploads/2024/05/cropped-image_2024-05-27_153243567-32x32.png">
    <!-- BOOTSTRAP LINK -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Select2 LINK -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">
</head>

<body>
    <div>
        <img src="https://drartex.id/wp-content/uploads/2024/09/BG-WEB_upscayl_4x_RealESRGAN_General_x4_v3.png" class="bg-img object-fit-cover">
        <div class="text-mask">
            <h1 class="font-weight-bold header-bold">E-WARRANTY</h1>
        </div>
    </div>
    
    <div class="container1">
        <br>
        <br>
    <form action="/e-warranty/{{ $check->code }}" method="post">
    @method('put')
    @csrf
    <div class="form-row label-font">
        <div class="form-group col-md-6">
            <label for="">Nama Konsumen</label>
            <input type="text" name="nama" class="form-control" id="" placeholder="Masukkan nama lengkap konsumen" style="border: 1px solid #aaa;" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">Tanggal Lahir Konsumen</label>
            <input type="text" class="form-control datepicker" name="tanggal" id="" placeholder="DD-MM-YYYY" style="border: 1px solid #aaa;"required>
        </div>
    </div>
    <div class="form-row label-font">
        <div class="form-group col-md-6">
            <label for="">Email Konsumen</label>
            <input type="email" class="form-control" name="email" id="" placeholder="Masukkan email konsumen" style="border: 1px solid #aaa;" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">No. Handphone Konsumen</label>
            <input type="tel" class="form-control" name="handphone" id="" placeholder="Masukkan no. handphone konsumen" style="border: 1px solid #aaa;"required>
        </div>
    </div>
    <div class="form-group label-font">
        <label for="">Alamat Konsumen</label>
        <input type="text" class="form-control" name="alamat" id="" placeholder="Masukkan alamat lengkap konsumen" style="border: 1px solid #aaa;" required>
    </div>
    <div class="form-group label-font">
        <label for="">Nama Toko & Alamat Dealer</label>
        <input type="text" class="form-control" name="alamat_reseller" id="" placeholder="Contoh : Premio Car Audio & Detailing, Jl. Green..." style="border: 1px solid #aaa;" required>
    </div>
    <div class="form-row label-font">
        <div class="form-group col-md-6">
            <label for="">No. Handphone Dealer</label>
            <input type="tel" class="form-control" name="handphone_reseller" id="" placeholder="Masukkan no. handphone dealer" style="border: 1px solid #aaa;" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">Tanggal Pemasangan</label>
            <input type="text" class="form-control datepicker" name="tgl_pasang" placeholder="DD-MM-YYYY" style="border: 1px solid #aaa;" required>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="form-label label-font">Merek Mobil</label>
        <select id="merek-dropdown" class="form-control select2" name="merk">
            <option value="">-- Pilih merek mobil --</option>
            @foreach ($mereks as $data)
            <option value="{{ $data->id }}">
                {{ $data->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="" class="form-label label-font">Tipe Mobil</label>
        <select id="tipe-dropdown" class="form-control select2" name="tipe">
            <option value="">-- Pilih tipe mobil --</option>
            @foreach ($tipe as $val)
            <option value="{{ $val->id }}">
                {{ $val->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-row label-font">
        <div class="form-group col-md-6">
            <label for="">Nomor Rangka Kendaraan</label>
            <input type="text" name="nomor_rangka" class="form-control" id="" placeholder="Masukkan nomor rangka kendaraan" style="border: 1px solid #aaa;" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">Nomor Plat Kendaraan</label>
            <input type="text" name="nomor_plat" class="form-control" id="" placeholder="Masukkan nomor plat kendaraan" style="border: 1px solid #aaa;"required>
        </div>
    </div>
    <div class="form-group">
        <label for="front_window" class="form-label label-font">Kaca Film Depan</label>
        <select id="front_window" class="form-control select2 window" name="front_window">
            <option value="">-- Pilih ID produk --</option>
            @foreach ($produk_window as $data)
            <option value="{{ $data->id_sub_roll }}">
                {{ $data->kode_sub_roll }} | {{ $data->nama_produk }} - {{ $data->roll_name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="side_window" class="form-label label-font">Kaca Film Samping</label>
        <select id="side_window" class="form-control select2 window" name="side_window">
            <option value="">-- Pilih ID produk --</option>
            @foreach ($produk_window as $data)
            <option value="{{ $data->id_sub_roll }}">
                {{ $data->kode_sub_roll }} | {{ $data->nama_produk }} - {{ $data->roll_name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="back_window" class="form-label label-font">Kaca Film Belakang</label>
        <select id="back_window" class="form-control select2 window" name="back_window">
            <option value="">-- Pilih ID produk --</option>
            @foreach ($produk_window as $data)
            <option value="{{ $data->id_sub_roll }}">
                {{ $data->kode_sub_roll }} | {{ $data->nama_produk }} - {{ $data->roll_name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="" class="form-label label-font">PPF</label>
        <select id="" class="form-control select2" name="ppf">
            <option value="">-- Pilih ID produk --</option>
            @foreach ($produk_ppf as $val)
            <option value="{{ $val->id_sub_roll }}">
                {{ $val->kode_sub_roll }} | {{ $val->nama_produk }} - {{ $val->roll_name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="panoramic" class="form-label label-font">Panoramic & Rear Protection</label>
        <select id="panoramic" class="form-control select2" name="panoramic">
            <option value="">-- Pilih ID produk --</option>
            @foreach($produk_panoramic as $val)
                <option value="{{ $val->id_sub_roll }}">
                    {{ $val->kode_sub_roll }} | {{ $val->nama_produk }} - {{ $val->roll_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="modal-footer border-top-0 d-flex">
        <button type="submit" class="btn btn-twhite">Submit</button>
    </div>
    </form>
    <br>
    <br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();

            function disableSelectedOptions() {
                $('.window option').prop('disabled', false); // Reset semua opsi

                $('.window').each(function() {
                    var selectedValue = $(this).val();

                    if (selectedValue) {
                        $('.window').not(this).find('option[value="' + selectedValue + '"]').prop('disabled', true);

                        var hiddenInputId = $(this).data('id') + '_hidden';
                        $('#' + hiddenInputId).val(selectedValue);
                    }
                });
            }

            // Initial call to disable options
            disableSelectedOptions();

            // Update when a select element changes
            $(document).on('change', '.window', function() {
                disableSelectedOptions();
            });


            $('.datepicker').datepicker({dateFormat: "dd-mm-yy"});
            /*------------------------------------------
            --------------------------------------------
            Merek Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#merek-dropdown').on('change', function () {
                var idMerek = this.value;
                $("#tipe-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-tipe')}}",
                    type: "POST",
                    data: {
                        merek_id: idMerek,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log(result);
                        $('#tipe-dropdown').html('<option value="">-- Pilih Tipe --</option>');
                        $.each(result.tipe, function (key, value) {
                            $("#tipe-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#tipe-dropdown').select2();
                    }
                });
            });
        });
    </script>
</body>
</html>