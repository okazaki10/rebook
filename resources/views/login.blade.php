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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
  <div class="d-flex" id="wrapper">
    <div id="page-content-wrapper " style="width: 100%;">
      <div class="row login">
        <div class="col-xs-12 col-md-7">
          <div class="login-logo">Re-book</div>
        </div>
        <div class="col-xs-12 col-md-5">
          <div class="login-form">
            <div class="container sign-up">
              <div class="mr-3 size-md color-grey">Belum punya akun ?</div>
              <button class="blue-button">Buat Akun</button>
            </div>

            <form class="container">
              <div class="form-group">
                <label for="formGroupExampleInput">Email</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan email" />
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Password</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukan password" />
              </div>

              <div class="row justify-content-between">
                <div class="col-xs-12 col-md-6">
                  <div class="size-md color-grey">Lupa password?</div>
                </div>
                <div class="col-xs-12 col-md-6 login-button">
                  <button class="blue-button">Masuk</button>
                </div>
              </div>
            </form>

            <div class="bantuan">
              <div class="text-bold size-md mb-3">Bantuan</div>
              <div class="d-flex">
                <div class="mr-3 color-grey">Pusat Bantuan</div>
                <div class="mr-3 color-grey">Syarat dan Ketentuan</div>
                <div class="mr-3 color-grey">Kebijakan Privasi</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- <div>Belum Punya Akun?
     <li class="nav-item active">
        <a class="daftar" href="#">Buat Akun<span class="sr-only">(current)</span></a>
      </li>
     </div> -->

      <!-- </div> -->
    </div>
    <!-- /#page-content-wrapper -->
  </div>

  <!-- /#wrapper -->

  <!-- Menu Toggle Script -->
</body>

</html>