<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""E-Warranty">
    <meta property="og:title" content=""E-Warranty">
    <meta property="og:description" content=""E-Warranty">

    <!-- PAGE TITLE HERE -->
    <title>Please Wait For Confirmation | DrArtexFilms</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <style>
        img {
            height: 276px; 
            width: 100%;
            object-fit: cover;
        }
        .text-center {
            text-align: center;
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
        }
    </style>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="https://drartexfilms.com/wp-content/uploads/2024/05/cropped-image_2024-05-27_153243567-32x32.png">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<div>
    <img src="https://drartex.id/wp-content/uploads/2024/09/BG-WEB_upscayl_4x_RealESRGAN_General_x4_v3.png" class="bg-img object-fit-cover">
    <div class="text-mask">
        <h1 class="font-weight-bold header-bold">E-WARRANTY</h1>
    </div>
</div>
<div class="container text-center">
    <br>
    <br>
    <h1 class="font-weight-bold" style="font-size: 24px;">Terima kasih telah mengisi data</h1>
    <p style="font-size: 15px;">Mohon untuk menunggu validasi dari pihak kami ya!</p>
    <br>
    <a class="btn btn-primary" style="" href="{{url('/')}}" >Balik ke halaman utama</a>
</div>    
</body>
</html>