<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Toko Salwa</title>

    <style>
    .gallery{
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        justify-content: center;
        align-items: center;
        margin: 40px 0;
    }
    .content {
        width: 20%;
        margin: 10px;
        box-sizing: border-box;
        float: left;
        text-align: left;
        border-radius: 20px;
        cursor: pointer;
        padding-top: 10px;
        transition: .4s;
        background: #f2f2f2;
    }
    .content:hover{
        box-shadow: 0 3px 6px rgba(0,0,0,0.16),
        0 3px 6px rgba(0,0,0,0.23);
        transform: translate(0px, -8px);
    }
    h5{
        text-align: center;
    }

    img{
        display: block;
    }

    p{
        color: #222f3e;
        padding-top: 0px;
    }
    </style>

    </head>
  <body>


    {{-- Navbar --}}
    @include('layouts.navbar')
   {{-- Content --}}

    <div class="gallery">

      @foreach ($produk as $data)
      <br>
      <br>

          <div class="content">
              <img src="{{ asset('/storage/produks/' .  $data->image)}}" width="100%" height="300">
              <br>
              <h5 class="card-title">{{$data -> nama_produk}}</h5>
              <div class="card-body">
                  <p class="card-text"><b>Deskripsi :</b> {{$data -> deskripsi}}</p>
                  <p class="card-text"><b>Rp. </b> {{$data -> harga}}</p>
                  <p class="card-text"><b>Kategori :</b> {{$data -> kategori->nama_kategori}}</p>
                  <p class="card-text"><b>Merek :</b> {{$data -> merek->nama_merek}}</p>

                  <a href="{{route ('produk.show', $data->id)}}" class="btn btn-success">Lihat Detail</a>
              </div>
          </div>
      @endforeach
  </div>
    {{-- /Content --}}


    {{-- Footer --}}
    @include('layouts.footer')
    {{-- /Footer --}}






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
