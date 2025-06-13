<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet" />
    <meta name="description" content=""E-Warranty">
    <meta property="og:title" content=""E-Warranty">
    <meta property="og:description" content=""E-Warranty">

    <!-- PAGE TITLE HERE -->
    <title>Claim Warranty | DrArtexFilms</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).on("click", "#send-it", function () {
        var a = document.getElementById("chat-input");
            if ("" != a.value) {
        var b = $("#get-number").text(),
            c = document.getElementById("chat-input").value,
            d = "https://web.whatsapp.com/send",
            e = b,
            f = "&text=" + c;
        if (
            /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
            navigator.userAgent
        )
    )
        var d = "whatsapp://send";
        var g = d + "?phone=+62 8567383863" + e + f;
        window.open(g, "_blank");
        }
    }),
  
    $(document).on("click", ".informasi", function () {
        (document.getElementById("get-number").innerHTML = $(this)
            .children(".my-number")
            .text()),
    $(".start-chat,.get-new").addClass("show").removeClass("hide"),
    $(".home-chat,.head-home").addClass("hide").removeClass("show"),
        (document.getElementById("get-nama").innerHTML = $(this)
            .children(".info-chat")
            .children(".chat-nama")
            .text()),
        (document.getElementById("get-label").innerHTML = $(this)
            .children(".info-chat")
            .children(".chat-label")
            .text());
    }),
  
    $(document).on("click", ".close-chat", function () {
        $("#whatsapp-chat").addClass("hide").removeClass("show");
    }),
  
    $(document).on("click", ".blantershow-chat", function () {
        $("#whatsapp-chat").addClass("show").removeClass("hide");
    });
  </script>
    <style>
    /* CSS Multiple Whatsapp Chat */
        
    .whatsapp-name {
        font-size: 16px;
        font-weight: 600;
        padding-bottom: 0;
        margin-bottom: 0;
        line-height: 0.5;
    }

    #whatsapp-chat {
        box-sizing: border-box !important;
        outline: none !important;
        position: fixed;
        width: 350px;
        border-radius: 10px;
        box-shadow: 0 1px 15px rgba(32, 33, 36, 0.28);
        bottom: 90px;
        right: 30px;
        overflow: hidden;
        z-index: 99;
        animation-name: showchat;
        animation-duration: 1s;
        transform: scale(1);
    }
    
    @keyframes change-text {
        0% {
            content: "Hanya direspon saat jam kerja";
        }
        100% {
            content: "Rata-rata dibalas dalam waktu 5 menit";
        }
    }
    
    .text-anim::after {
        display: block;
        content: "Hanya direspon saat jam kerja";
        /* animation-duration = number of keyframes * duration per keyframe */
        animation: change-text 10s infinite;
    }
    
    a.blantershow-chat {
        /*   background: #009688; */
        background: #fff;
        color: #404040 !important;
        text-decoration: none !important;
        position: fixed;
        display: flex;
        font-weight: 400;
        justify-content: space-between;
        z-index: 98;
        bottom: 25px;
        right: 30px;
        font-size: 15px;
        padding: 10px 20px;
        border-radius: 30px;
        box-shadow: 0 1px 15px rgba(32, 33, 36, 0.28);
    }
    
    a.blantershow-chat svg {
        transform: scale(1.2);
        margin: 0 10px 0 0;
    }

    .header-chat {
        /*   background: linear-gradient(to right top, #6f96f3, #164ed2); */
        background: #009688;
        background: #095e54;
        color: #fff;
        padding: 20px;
    }

    .header-chat h3 {
        margin: 0 0 10px;
    }

    .header-chat p {
        font-size: 14px;
        line-height: 1.7;
        margin: 0;
    }

    .info-avatar {
        position: relative;
    }
    
    .info-avatar img {
        border-radius: 100%;
        width: 50px;
        height: 50px;
        float: left;
        margin: 0 10px 0 0;
    }

    a.informasi {
        padding: 20px;
        display: block;
        overflow: hidden;
        animation-name: showhide;
        animation-duration: 0.5s;
    }
    
    a.informasi:hover {
        background: #f1f1f1;
    }
    
    .info-chat span {
        display: block;
    }
    
    #get-label,
        span.chat-label {
        font-size: 12px;
        color: #888;
    }
    
    #get-nama,
        span.chat-nama {
        margin: 5px 0 0;
        font-size: 15px;
        font-weight: 700;
        color: #222;
    }
    
    #get-label,
    #get-nama {
        color: #fff;
    }
    
    span.my-number {
        display: none;
    }
    
    /* .blanter-msg {
        color: #444;
        padding: 20px;
        font-size: 12.5px;
        text-align: center;
        border-top: 1px solid #ddd;
    } */
    
    textarea#chat-input {
        border: none;
        font-family: "Arial", sans-serif;
        width: 100%;
        height: 41px;
        outline: none;
        resize: none;
        padding: 10px;
        font-size: 14px;
    }

    a#send-it {
        width: 30px;
        font-weight: 700;
        padding: 7px 5px 7px 5px;
        background: #eee;

        svg {
            fill: #a6a6a6;
            height: 20px;
            width: 23px;
        }
    }

    .first-msg {
        background: transparent;
        padding: 30px;
        text-align: center;
        & span {
            background: #e2e2e2;
            color: #333;
            font-size: 14.2px;
            line-height: 1.7;
            border-radius: 10px;
            padding: 15px 20px;
            display: inline-block;
        }
    }

    .start-chat .blanter-msg {
        display: flex;
    }
    
    #get-number {
        display: none;
    }
    
    a.close-chat {
        position: absolute;
        top: 5px;
        right: 15px;
        color: #fff !important;
        font-size: 30px;
        text-decoration: none !important;
    }

    @keyframes ZpjSY {
        0% {
            background-color: rgb(182, 181, 186);
        }
        15% {
            background-color: rgb(17, 17, 17);
        }
        25% {
            background-color: rgb(182, 181, 186);
        }
    }

    @keyframes hPhMsj {
        15% {
            background-color: rgb(182, 181, 186);
        }
        25% {
            background-color: rgb(17, 17, 17);
        }
        35% {
            background-color: rgb(182, 181, 186);
        }
    }

    @keyframes iUMejp {
        25% {
            background-color: rgb(182, 181, 186);
        }
        35% {
            background-color: rgb(17, 17, 17);
        }
        45% {
            background-color: rgb(182, 181, 186);
        }
    }

    @keyframes showhide {
        from {
            transform: scale(0.5);
            opacity: 0;
        }
    }
    
    @keyframes showchat {
        from {
            transform: scale(0);
            opacity: 0;
        }
    }
    
    @media screen and (max-width: 480px) {
        #whatsapp-chat {
            width: auto;
            left: 5%;
            right: 5%;
            font-size: 80%;
        }
    }
    
    .hide {
        display: none;
        animation-name: showhide;
        animation-duration: 0.5s;
        transform: scale(1);
        opacity: 1;
    }
    
    .show {
        display: block;
        animation-name: showhide;
        animation-duration: 0.5s;
        transform: scale(1);
        opacity: 1;
    }

    .whatsapp-message-container {
        display: flex;
        z-index: 1;
    }

    .whatsapp-message {
        padding: 7px 14px 6px;
        background-color: rgb(255, 255, 255);
        border-radius: 0px 8px 8px;
        position: relative;
        transition: all 0.3s ease 0s;
        opacity: 0;
        transform-origin: center top 0px;
        z-index: 2;
        box-shadow: rgba(0, 0, 0, 0.13) 0px 1px 0.5px;
        margin-top: 4px;
        margin-left: -54px;
        max-width: calc(100% - 66px);
    }

    .whatsapp-chat-body {
        padding: 20px 20px 20px 10px;
        background-color: rgb(230, 221, 212);
        position: relative;
        
        &::before {
            display: block;
            position: absolute;
            content: "";
            left: 0px;
            top: 0px;
            height: 100%;
            width: 100%;
            z-index: 0;
            opacity: 0.08;
            background-image: url("https://elfsight.com/assets/chats/patterns/whatsapp.png");
            // background-image: url(https://res.cloudinary.com/eventbree/image/upload/v1575782560/Widgets/whatsappbg_opt.jpg);
        }
    }

    .dAbFpq {
        display: flex;
        z-index: 1;
    }

    .eJJEeC {
        background-color: rgb(255, 255, 255);
        width: 52.5px;
        height: 32px;
        border-radius: 16px;
        display: flex;
        -moz-box-pack: center;
        justify-content: center;
        -moz-box-align: center;
        align-items: center;
        margin-left: 10px;
        opacity: 0;
        transition: all 0.1s ease 0s;
        z-index: 1;
        box-shadow: rgba(0, 0, 0, 0.13) 0px 1px 0.5px;
    }

    .hFENyl {
        position: relative;
        display: flex;
    }

    .ixsrax {
        height: 5px;
        width: 5px;
        margin: 0px 2px;
        border-radius: 50%;
        display: inline-block;
        position: relative;
        animation-duration: 1.2s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
        top: 0px;
        background-color: rgb(158, 157, 162);
        animation-name: ZpjSY;
    }

    .dRvxoz {
        height: 5px;
        width: 5px;
        margin: 0px 2px;
        background-color: rgb(182, 181, 186);
        border-radius: 50%;
        display: inline-block;
        position: relative;
        animation-duration: 1.2s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
        top: 0px;
        animation-name: hPhMsj;
    }

    .kAZgZq {
        padding: 7px 14px 6px;
        background-color: rgb(255, 255, 255);
        border-radius: 0px 8px 8px;
        position: relative;
        transition: all 0.3s ease 0s;
        opacity: 0;
        transform-origin: center top 0px;
        z-index: 2;
        box-shadow: rgba(0, 0, 0, 0.13) 0px 1px 0.5px;
        margin-top: 4px;
        margin-left: -54px;
        max-width: calc(100% - 66px);
  
        &::before {
            position: absolute;
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAmCAMAAADp2asXAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAACQUExURUxpccPDw9ra2m9vbwAAAAAAADExMf///wAAABoaGk9PT7q6uqurqwsLCycnJz4+PtDQ0JycnIyMjPf3915eXvz8/E9PT/39/RMTE4CAgAAAAJqamv////////r6+u/v7yUlJeXl5f///5ycnOXl5XNzc/Hx8f///xUVFf///+zs7P///+bm5gAAAM7Ozv///2fVensAAAAvdFJOUwCow1cBCCnqAhNAnY0WIDW2f2/hSeo99g1lBYT87vDXG8/6d8oL4sgM5szrkgl660OiZwAAAHRJREFUKM/ty7cSggAABNFVUQFzwizmjPz/39k4YuFWtm55bw7eHR6ny63+alnswT3/rIDzUSC7CrAziPYCJCsB+gbVkgDtVIDh+DsE9OTBpCtAbSBAZSEQNgWIygJ0RgJMDWYNAdYbAeKtAHODlkHIv997AkLqIVOXVU84AAAAAElFTkSuQmCC");
            background-position: 50% 50%;
            background-repeat: no-repeat;
            background-size: contain;
            content: "";
            top: 0px;
            left: -12px;
            width: 12px;
            height: 19px;
        }
    }

    .bMIBDo {
        font-size: 13px;
        font-weight: 700;
        line-height: 18px;
        color: rgba(0, 0, 0, 0.4);
    }

    .iSpIQi {
        font-size: 14px;
        line-height: 19px;
        margin-top: 4px;
        color: rgb(17, 17, 17);
    }

    .iSpIQi {
        font-size: 14px;
        line-height: 19px;
        margin-top: 4px;
        color: rgb(17, 17, 17);
    }

    .cqCDVm {
        text-align: right;
        margin-top: 4px;
        font-size: 12px;
        line-height: 16px;
        color: rgba(17, 17, 17, 0.5);
        margin-right: -8px;
        margin-bottom: -4px;
    }
        
    img {
        height: 276px; 
        width: 100%;
        object-fit: cover;
    }

    .form-warranty {
        width: 500px !important;
    }

    .container1 {
        width: 900px;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
        
    .float {
	    position:fixed;
	    width:60px;
	    height:60px;
	    bottom:40px;
	    right:40px;
	    background-color:#25d366;
	    color:#FFF;
	    border-radius:50px;
	    text-align:center;
        font-size:30px;
	    box-shadow: 2px 2px 3px #999;
        z-index:100;
    }
        
    .h1-warranty {
        font-size: 30px;
        font-family: "Montserrat", Sans-serif;
    }

    .p-warranty {
        font-size: 15px;
        font-family: "Montserrat", Sans-serif;
    }
        
    .p-notes {
        font-size: 12px;
    }

    .my-float{
	    margin-top:16px;
    }

    .header-bold {
        font-size:40px;
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

    @media (min-width: 320px) and (max-width: 767px) {

        .float {
	        position:fixed;
	        width:60px;
	        height:60px;
	        bottom:10px;
	        right:10px;
	        background-color:#25d366c7;
	        color:#FFF;
	        border-radius:50px;
	        text-align:center;
            font-size:30px;
	        box-shadow: 2px 2px 3px #999;
            z-index:100;
        }

        img {
            height: 183px; 
            width: 100%;
            object-fit: cover;
        }
            
        .header-bold {
            font-size: 30px;
        }

        .h1-warranty {
            font-size: 25px;
        }

        .p-warranty {
            font-size: 11px;
        }
            
        .p-notes {
            font-size: 10px;
        }

        .form-warranty {
                font-size: 12px !important;
                padding-right: 20px;
                padding-left: 20px;
        }
            
        .btn-mobile {
            font-size: 12px !important;
        }

        .container1 {
            width: 361px;
            padding-right: 30px;
            padding-left: 30px;
        }

        .text-mask {
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0, 0.4); 
            color: white;
            font-weight: bold;
            border: 0px solid;

            /* now center the mask*/
            position: absolute;
            top: 77px;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 100%;
            padding: 84px;
            text-align: center;
            }
        }
    </style>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="https://drartexfilms.com/wp-content/uploads/2024/05/cropped-image_2024-05-27_153243567-32x32.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
    <div id='whatsapp-chat' class='hide'>
  <div class='header-chat'>
    <div class='head-home'>
      <div class='info-avatar'><img src='https://drartex.id/wp-content/uploads/2024/08/avatar.png' /></div>
      <p><span class="whatsapp-name">DrARTEX® Support</span><br><small class="text-anim"></small></p>

    </div>
    <div class='get-new hide'>
      <div id='get-label'></div>
      <div id='get-nama'></div>
    </div>
  </div>
  <div class='home-chat'>

  </div>
  <div class='start-chat'>
    <div pattern="https://elfsight.com/assets/chats/patterns/whatsapp.png" class="WhatsappChat__Component-sc-1wqac52-0 whatsapp-chat-body">
      <div class="WhatsappChat__MessageContainer-sc-1wqac52-1 dAbFpq">
        <div style="opacity: 0;" class="WhatsappDots__Component-pks5bf-0 eJJEeC">
          <div class="WhatsappDots__ComponentInner-pks5bf-1 hFENyl">
            <div class="WhatsappDots__Dot-pks5bf-2 WhatsappDots__DotOne-pks5bf-3 ixsrax"></div>
            <div class="WhatsappDots__Dot-pks5bf-2 WhatsappDots__DotTwo-pks5bf-4 dRvxoz"></div>
            <div class="WhatsappDots__Dot-pks5bf-2 WhatsappDots__DotThree-pks5bf-5 kXBtNt"></div>
          </div>
        </div>
        <div style="opacity: 1;" class="WhatsappChat__Message-sc-1wqac52-4 kAZgZq">
          <div class="WhatsappChat__Author-sc-1wqac52-3 bMIBDo">DrARTEX® Support</div>
          <div class="WhatsappChat__Text-sc-1wqac52-2 iSpIQi">Halo! 👋<br>Ada yang bisa kami bantu?</div>
        </div>
      </div>
    </div>

    <div class='blanter-msg'>
      <textarea id='chat-input' placeholder='Kirim Pesan' maxlength='120' row='1'></textarea>
      <a href='javascript:void;' id='send-it'><svg viewBox="0 0 448 448">
          <path d="M.213 32L0 181.333 320 224 0 266.667.213 416 448 224z" />
        </svg></a>

    </div>
  </div>
  <div id='get-number'></div><a class='close-chat' href='javascript:void'>×</a>
</div>
<a class='blantershow-chat' href='javascript:void' title='Show Chat'><svg width="20" viewBox="0 0 24 24">
    <defs />
    <path fill="#eceff1" d="M20.5 3.4A12.1 12.1 0 0012 0 12 12 0 001.7 17.8L0 24l6.3-1.7c2.8 1.5 5 1.4 5.8 1.5a12 12 0 008.4-20.3z" />
    <path fill="#4caf50" d="M12 21.8c-3.1 0-5.2-1.6-5.4-1.6l-3.7 1 1-3.7-.3-.4A9.9 9.9 0 012.1 12a10 10 0 0117-7 9.9 9.9 0 01-7 16.9z" />
    <path fill="#fafafa" d="M17.5 14.3c-.3 0-1.8-.8-2-.9-.7-.2-.5 0-1.7 1.3-.1.2-.3.2-.6.1s-1.3-.5-2.4-1.5a9 9 0 01-1.7-2c-.3-.6.4-.6 1-1.7l-.1-.5-1-2.2c-.2-.6-.4-.5-.6-.5-.6 0-1 0-1.4.3-1.6 1.8-1.2 3.6.2 5.6 2.7 3.5 4.2 4.2 6.8 5 .7.3 1.4.3 1.9.2.6 0 1.7-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.2-.3-.3-.6-.4z" />
  </svg> Chat dengan Kami</a>
    <div>
    <img src="https://drartex.id/wp-content/uploads/2024/09/BG-WEB_upscayl_4x_RealESRGAN_General_x4_v3.png" class="bg-img object-fit-cover header">
    <div class="text-mask">
        <h1 class="font-weight-bold header-bold">E-WARRANTY</h1>
    </div>
    </div>
    <div class="container1">
    <br>
    <br>
    <h1 class="font-weight-bold text-center h1-warranty">TERIMA KASIH</h1>
    <p class="text-center p-warranty">Anda telah menggunakan produk berkualitas dari <br><b>DrARTEX® FILMS</b></p>
    <p class="text-center p-warranty">
            Dengan setiap pembelian produk DrARTEX® Films, anda telah mendapatkan jaminan <b>garansi 1 (satu) tahun</b>. 
        <br>Untuk mendapatkan <b>garansi maksimal hingga 10 Tahun+*</b>, 
        silahkan aktivasi dan isi data diri anda secara lengkap pada halaman berikut setelah mengisi Kode Garansi anda.
    </p>
    <br>
    <form action="/claim-warranty" method="post">
    @csrf
    <div class="d-flex justify-content-center">
    <div class="input-group input">
        <label for="" class="form-label"></label>
        <input type="text" placeholder="Masukkan Kode Garansi" class="form-control input form-warranty" name="code" id="" aria-describedby="helpId" placeholder="" required/>
        <button class="btn btn-primary btn-mobile" type="submit">
            Submit
        </button>
    </div>
    </div>
    @if ($errors->has('code'))
        <div class="text-danger text-center mt-2" style="font-size: 12px;">
            {{ $errors->first('code') }}
        </div>
    @endif
    </form>
    <br>
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <p class="p-notes">Note :
                <br>1. Data tidak ditemukan atau salah informasi? Silakan hubungi Tim DrARTEX® Support via WhatsApp.
                <br>2. Masa garansi produk sesuai dengan tipe produk yang terpasang.
                <br>
                <br>* Garansi 10 tahun+ untuk beberapa produk DrARTEX®.
            </p>
        </div>
    </div>
    <br>
    <br>
    <br>
</body>
</html>