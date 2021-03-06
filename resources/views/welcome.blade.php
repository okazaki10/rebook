<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rebook</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  <link href="{{ URL::asset('css/simple-sidebar.css') }}" rel="stylesheet">

</head>

<body>


  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light" id="sidebar-wrapper" style="position: fixed;z-index: 1000;">

      <div class="list-group list-group-flush">

        <div class="sidebar-heading bg-dark text-light " style="
          padding-top: 60px;
          text-align: center;

          "><img src="https://st2.depositphotos.com/1104517/11965/v/950/depositphotos_119659092-stock-illustration-male-avatar-profile-picture-vector.jpg" width="100" height="100" class="rounded-circle" alt="Cinque Terre" style="display: block;
          margin-left: auto;
          margin-right: auto;">
          Anda Belum Login</div>
        <a href="{{url('/')}}" class="list-group-item list-group-item-action">Beranda</a>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" style="width: 100%;">

      <nav class="navbar navbar-dark bg-dark navbar-expand-lg" style="position: fixed; width:100%;z-index: 10000;">
        <button class="btn btn-outline-light" id="menu-toggle">Menu</button>
        <div class="navbar-brand" style="background-image: url('kemas.png');background-size: 50px 50px;background-position: left;background-repeat: no-repeat; padding-left: 50px">Rebook</div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

            <div class="form-inline">
              <form method="post" action="{{action('DaftarController@validasi')}}">
                {{csrf_field()}}
                <input class="form-control mr-sm-2" type="text" placeholder="email" aria-label="Search" id="nrp" name="email">
                <input class="form-control mr-sm-2" type="password" placeholder="password" aria-label="Search" id="password" name="password">
                <button type="submit" class="btn btn-success mr-sm-2">Login</button>
              </form>

            </div>
            <a href="{{action('DaftarController@create')}}">
              <button class="btn btn-primary mr-sm-2" type="button">Daftar</button>
            </a>

          </ul>
        </div>
      </nav>

      <div id="containerfluid" class="container-fluid">
        <h1 class="mt-4" style="font-weight: bold;"></h1>
        <h2 class="mt-4">Beli/sewa buku</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div><br />
        @endif
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br />
        @endif
        @if (\Session::has('failed'))
        <div class="alert alert-danger">
          <p>{{ \Session::get('failed') }}</p>
        </div><br />
        @endif
        <form method="GET" action="index.search">
          <div class="row">
            <div class="col-md-3">
              <select name="type" class="form-control">
                <option value="judul">Judul</option>
                <option value="kategori">Kategori</option>
                <option value="penulis">Penulis</option>
              </select>
            </div>
            <div class="col-md-3">
              <input type="text" class="form-control" name="pencarian">
            </div>
            <div class="col-md-6">
              <button type="submit" name="sewa" value="0" class="btn btn-success mr-sm-2">Cari</button>
              <button type="submit" name="sewa" value="1" class="btn btn-primary mr-sm-2">Cari yang bisa disewa</button>
            </div>
          </div>
        </form>
        @foreach($list_bukus as $list_buku)
        <div class="jumbotron jumbotron-fluid" style=" padding-bottom: 0px;padding-top: 0px;">
          <div class="container container-fluid">
            <div class="card">
              <div class="row">

                <div class="col-md-6">

                  <img src="{{asset($list_buku->gambar)}}" class="img-fluid">

                </div>

                <div class="col-md-6">
                  <div class="card-block">
                    <br>
                    <span class="card-title" style="font-size: 18pt;font-weight: bold;">{{$list_buku->judul}}</h4></span>

                    <h5>{{$list_buku->penulis}}</h5>


                    <h6>Bisa disewa? : {{$list_buku->bisa_disewa == '1'?'Ya':'Tidak'}}</h6>
                    <h6>Kategori : {{$list_buku->kategori}}</h6>
                    <h6 style="font-weight: bold;">Tanggal Terbit : {{$list_buku->tanggal_terbit}}</h6>
                    <h6>Stok : {{$list_buku->stok}}</h6>
                    <p style="font-weight: bold;">Deskripsi</p>
                    <p style="text-align: justify;text-indent: 30px; margin-right: 25px;">{{$list_buku->deskripsi}}</p>
                  </div>

                  <span class="text" style="font-size: 20pt; font-weight: 1000" ;>Rp. {{$list_buku->harga}}</span>
                  <span class="resize2">
                    <button class="btn btn-primary" type="submit" disabled>Lihat</button></a>
                  </span>

                </div>
              </div>
            </div>
          </div>
        </div>

        @endforeach

        {{$list_bukus->links()}}
      </div>
    </div>


    <!-- /#page-content-wrapper -->

  </div>

  <!-- /#wrapper -->


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $(document).ready(function() {
      $('#list').click(function(event) {
        event.preventDefault();
        $('#products .item').addClass('list-group-item');
      });
      $('#grid').click(function(event) {
        event.preventDefault();
        $('#products .item').removeClass('list-group-item');
        $('#products .item').addClass('grid-group-item');
      });
    });
  </script>

</body>

</html>