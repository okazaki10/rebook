
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

            "><img src="{{asset($user->foto_profil)}}" width="100" height="100" class="rounded-circle" alt="Cinque Terre" style="display: block;
            margin-left: auto;
            margin-right: auto;">
          {{ $user->nama_lengkap}}</div>
        <a href="{{url('/')}}" class="list-group-item list-group-item-action">Beranda</a>
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
          
                <div class="form-inline">
                  <input class="form-control mr-sm-2" type="text" placeholder="NRP" aria-label="Search" id="nrp">
                  <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Search" id="password">
                  <button class="btn btn-success mr-sm-2">Login</button>
                  
                </div>
            <a href="{{action('DaftarController@logout')}}">
              <button class="btn btn-primary mr-sm-2" type="button">Logout</button>
            </a>

          </ul>
        </div>
      </nav>
      
      <div id="containerfluid" class="container-fluid">
 
        <h2 class="mt-4">Tambahkan Buku</h2>
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
        <div class="form-group">
      <p><img src="{{asset($list_buku->gambar)}}" width=100 height=100></p>
      </div>
    <div class="form-group">
      <label>nama penjual</label>
      <p>{{$list_buku->nama_lengkap}}</p>
      </div>
      <div class="form-group">
      <label>alamat penjual</label>
      <p>{{$list_buku->alamat}}</p>
      <div class="form-group">
    <label>judul buku</label>
    <p>{{$list_buku->judul}}</p>
    </div>
    <div class="form-group">
    <label>stok</label>
    <p>{{$list_buku->stok}}</p>
    </div>
    <div class="form-group">
    <label>harga</label>
    <p>{{$list_buku->harga}}</p>
    </div>
   
    </div>
		<form method="POST" enctype="multipart/form-data" action="{{action('PembelianController@store')}}">
			{{csrf_field()}}
            <input type="hidden" name="id_penjual" value="{{$list_buku->id_penjual}}" class="form-control">
            <input type="hidden" name="id_list_buku" value="{{$id}}"class="form-control">
            <div class="form-group">
      <label>beli jumlah</label>
      <input type="text" name="jumlah" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">beli</button>
  </form>
  <a href="{{action('ChatController@show', $list_buku->id_penjual)}}"
class="btn btn-warning">Chat penjual</a>
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
  <div>

