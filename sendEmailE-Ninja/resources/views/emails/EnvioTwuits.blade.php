<!doctype html>
<html lang="en">
  <head>
    <title>Bienvenido</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <h1 style="color: #7c795d; font-family: 'Trocchi', serif; font-size: 45px; font-weight: normal; line-height: 48px; margin: 0;">Eventos.Ninja</h1>
      <br>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
            <div style="">
            </div>
            <center>
            <h1 style="color: #7c795d; font-family: 'Source Sans Pro', sans-serif; font-size: 28px; font-weight: 400; line-height: 32px; margin: 0 0 24px;">Hola {{$details['user']}} Eventos.Ninja te saluda </h1>
            <br>
            <h1 style="color: #7c795d; font-family: 'Source Sans Pro', sans-serif; font-size: 28px; font-weight: 400; line-height: 32px; margin: 0 0 24px;">mira todos los twuits y selecciona cualquiera que te guste</h1>
            </center>
    <center>
    @foreach ($details['twuit'] as $publicacion)
    <p style="
	
	background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
	background-color:#ffec64;
	border-radius:6px;
	border:1px solid #ffaa22;
	display:inline-block;
	cursor:pointer;
	color:#333333;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffee66;
  ">{{$publicacion->publicaciones}}</p>
  @endforeach
    <p>Gracias</p>
            </div>
        </div>
    </div>
  </body>
</html>