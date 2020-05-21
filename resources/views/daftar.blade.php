
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

         
        </div>
      </nav>
      
      <div id="containerfluid" class="container-fluid">
 
        <h2 class="mt-4">Daftar</h2>
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><br />
		@endif
		@if (\Session::has('failed'))
		<div class="alert alert-danger">
			<p>{{ \Session::get('failed') }}</p>
		</div><br />
		@endif
		<form enctype="multipart/form-data" method="post" action="{{action('DaftarController@store')}}">
			{{csrf_field()}}
    <div class="form-group">
      <label>email</label>
      <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
      <label>password</label>
      <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
      <label>konfirmasi password</label>
      <input type="password" name="konfirmasi_password" class="form-control">
    </div>
    <div class="form-group">
      <label>Nama Lengkap</label>
      <input type="text" name="nama_lengkap" class="form-control">
    </div>
    <div class="form-group">
      <label>Alamat</label>
      <input type="text" name="alamat" class="form-control">
    </div>
    <div class="form-group">
      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" class="form-control">
    </div>
	<div class="form-group">
      <label>no hp</label>
      <input type="number" name="no_hp" class="form-control">
    </div>
    <div class="form-group">
      <label>Sebagai</label>
      <select name="status" class="form-control">
        <option value="1">Pembeli</option>
		<option value="2">Penjual</option>
      </select>
    </div>
    <div class="form-group">
      <label>Foto profil</label>
      <input type="file" name="foto_profil" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Daftar</button>
  </form>

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
