<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="muni huamanguilla">
  <meta name="keyword" content="">
  <title>Muni - Login</title>

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
</head>

<body>
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="/">
        <h2 class="form-login-heading">Iniciar Sesion</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="Cuenta" autofocus>
          <br>
          <input type="password" class="form-control" placeholder="Contraseña">
          <label class="checkbox">
            <input type="checkbox" value="remember-me"> Recuerdame
            <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Olvidé mi contraseña?</a>
            </span>
            </label>
          <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Ingresar</button>
          
        </div>
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
