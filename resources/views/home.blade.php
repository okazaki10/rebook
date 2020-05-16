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


  <div class="d-flex" id="wrapper" <!-- Page Content -->
    <div id="page-content-wrapper" style="width: 100%;">

      <x-navbar />

      <div class="jumbotron jumbotron-fluid">
        <img class="main-bg" src="{{ URL::asset('img/main-bg.png') }}" alt="">
        <div class="main-quote">
          <div class=" container">
            <h1 class="display-4">"Selama toko buku ada,
              selama itu pustaka
              bisa dibentuk kembali."</h1>
            <p class="lead">- Tan Malaka</p>

          </div>
        </div>
      </div>

      <section class="popular">
        <div class="container">
          <div class="popular-content">
            <div class="popular-title">Popular</div>
            <div class="row popular-image">

              <div class="col-xs-12 col-md-6 col-lg-4">
                <img alt="harpot" src="{{ URL::asset('img/harry-potter-chamber-of-secret.png') }}">
              </div>
              <div class="col-xs-12 col-md-6 col-lg-4">
                <img alt="harpot" src="{{ URL::asset('img/very-nice.png') }}">
              </div>
              <div class="col-xs-12 col-md-6 col-lg-4">
                <img alt="harpot" src="{{ URL::asset('img/mockingjay.png') }}">
              </div>

            </div>
          </div>
        </div>
      </section>

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

    $("#open-navbar").click(function() {
      $('.navbar-expand-lg').toggleClass('show')
    });
  </script>

</body>

</html>