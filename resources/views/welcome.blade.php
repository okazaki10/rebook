
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
    <div class="bg-light" id="sidebar-wrapper" style="position: fixed;z-index: 1000;" >

      <div class="list-group list-group-flush">
        
          <div class="sidebar-heading bg-dark text-light " style="
          padding-top: 60px;
          text-align: center;

          "><img src="https://st2.depositphotos.com/1104517/11965/v/950/depositphotos_119659092-stock-illustration-male-avatar-profile-picture-vector.jpg" width="100" height="100" class="rounded-circle" alt="Cinque Terre" style="display: block;
          margin-left: auto;
          margin-right: auto;">
        Anda Belum Login</div>
     <x-navbar />
      <a href="logout.html" class="list-group-item list-group-item-action">Beranda</a>
      <a href="logout.html" class="list-group-item list-group-item-action bg-light">Arsitektur</a>
      <a href="logout.html" class="list-group-item list-group-item-action bg-light">Desain Produk</a>
      <a href="logout.html" class="list-group-item list-group-item-action bg-light">Perencanaan Wilayah Kota</a>
      <a href="logout.html" class="list-group-item list-group-item-action bg-light">Desain Interior</a>
      <a href="logout.html" class="list-group-item list-group-item-action bg-light">Desain Komunikasi Visual</a>
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
          <div class="navbar-brand">Cari Semua Barang</div>
          <form class="form-inline" action="cari.html" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" style="margin-right: 50px;" type="submit">Search</button>
              </form>
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
      <h1 class="mt-4" style="font-weight: bold;">Fakultas Arsitektur Desain dan Perencanaan</h1>
      <h2 class="mt-4">Arsitektur</h2>
      <p>Hot Items</p>
      <div id="products" class="row view-group">
        <div class="item col-xs-4 col-lg-4" style="flex:0 0 15%;">
          <a href="barang.html" class="thumbnail card" style="padding-top: 15px;text-decoration: none;">
          <div class="block">
            <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/medium//99/MTA-2857671/dulux_dulux-catylac-eksterior-tinting-cat-tembok---super-white--20-l--_full02.jpg" width="100" height="100">
          </div>
          <div class="caption card-body" style="padding-left: 5px;padding-top: 0px;padding-right: 5px;padding-bottom: 0px;">
          <h4 class="namabarang">
          jual cat kualitas super mantap</h4>
          <p class="harga" style="margin-bottom: 5px;">Rp 5.000.000</p>
          <p style="color:black"> 
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star unchecked"></span>&nbsp;(10)
          </p>
        </div>
      </a>
    </div>
   
    

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
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
  });
</script>

</body>

</html>
