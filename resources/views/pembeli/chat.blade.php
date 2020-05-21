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

        <a href="{{action('ProfilePembeliController@index')}}">
          <div class="sidebar-heading bg-dark text-light " style="
            padding-top: 60px;
            text-align: center;

            "><img src="{{asset($user->foto_profil)}}" width="100" height="100" class="rounded-circle" alt="Cinque Terre" style="display: block;
            margin-left: auto;
            margin-right: auto;">
            {{ $user->nama_lengkap }}
          </div>
        </a>
        <a href="{{url('pembeli')}}" class="list-group-item list-group-item-action">Beranda</a>
        <a href="{{action('PembelianController@index')}}" class="list-group-item list-group-item-action bg-light">Beli/sewa buku</a>
        <a href="{{action('KeranjangBelanjaController@index')}}" class="list-group-item list-group-item-action bg-light">Keranjang beli</a>
        <a href="{{action('KeranjangSewaController@index')}}" class="list-group-item list-group-item-action bg-light">Keranjang sewa</a>
        <a href="{{action('TransaksiSaldoController@index')}}" class="list-group-item list-group-item-action bg-light">Isi saldo</a>
        <a href="{{action('ChatController@index')}}" class="list-group-item list-group-item-action bg-light">Chat penjual</a>
        <a href="{{action('StatusPengirimanController@index')}}" class="list-group-item list-group-item-action bg-light">Cek status pengiriman</a>
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
              <p class="text-white mr-sm-2" style="
    margin-right: 20px;
    margin-bottom: 0px;
">Saldo : Rp.{{$user->saldo}}</p>


            </div>

            <a href="{{action('DaftarController@logout')}}">
              <button class="btn btn-danger mr-sm-2" type="button">Logout</button>
            </a>

          </ul>
        </div>
      </nav>


      <div id="containerfluid" class="container-fluid">

        <h2 class="mt-4">Chat</h2>
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
        <div class="row fixed-bottom bg-white" style="
    margin-bottom: 0px;
">
          <div class="col-md-2">

          </div>
          <div class="col-md-1" style="
    margin-bottom: 0px;
    margin-top: 9px;
">
            <h6>Pesan :</h6>
          </div>
          <div class="col-md-8">
            <input type="text" name="chat" id="chat" class="form-control">
          </div>
          <div class="col-md-1">
            <button type="button" name="send" id="send" class="btn btn-primary" onclick="kirim()">kirim</button>
          </div>
        </div>
        <div id="handle" style="
    margin-bottom: 50px;
">
        </div>



      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      <script>
        getMessage();
        setInterval(function() {
          getMessage();
        }, 500);

        $("#chat").on('keyup', function(e) {
          if (e.keyCode === 13) {
            kirim();
          }
        });

        function getMessage() {
          $.ajax({
            type: 'GET',
            url: 'handlechat/{{$id_penjual}}/',
            data: '',
            success: function(data) {
              $("#handle").html(data);
            }
          });
        }

        function getMessage2() {
          $.ajax({
            type: 'GET',
            url: 'handlechat/{{$id_penjual}}/',
            data: '',
            success: function(data) {
              $("#handle").html(data);
              window.scrollTo(0, document.body.scrollHeight);
            }
          });
        }

        function kirim() {

          var chat = $('#chat').val();
          var csrf_token = '{{csrf_token()}}';
          var id_penjual = '{{$id_penjual}}';
          $.ajax({
            type: 'GET',
            url: "handlechat/kirim/" + id_penjual + "/" + chat + "/",
            data: '',
            success: function(data) {
              getMessage2();
            }
          });
          $('#chat').val('');
        }
      </script>




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
<div>