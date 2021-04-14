<!doctype html>
<html lang="en">
  <head>
    <title>Bienvenido</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="background-color:#ff5f45">
      <h1 style="color: #FFFFFF; font-family: 'Trocchi', serif; font-size: 45px; font-weight: normal; line-height: 48px; margin: 0;">Eventos.Ninja</h1>
      <br>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
            <div style="">
            </div>
            <center>
            <h1 style="color: #FFFFFF; font-family: 'Source Sans Pro', sans-serif; font-size: 28px; font-weight: 400; line-height: 32px; margin: 0 0 24px;">Hola {{$details['user']}} Eventos.Ninja te saluda </h1>
            <br>
            <h1 style="color: #FFFFFF; font-family: 'Source Sans Pro', sans-serif; font-size: 28px; font-weight: 400; line-height: 32px; margin: 0 0 24px;">Entérate de los eventos mas importantes </h1>
            </center>
    <center>
    @foreach ($details['twuit'] as $publicacion)
        <p align="left" style="border: 2px solid #000000;
        background: #1C1C1C;
        height: 25%;
        width: 50%x;
        padding: 10px;
        margin: 10px;
        color: #FFFFFF;
        font-size: 15px;"

        >
        {{$publicacion->nombre}}
          <br>
        {{$publicacion->email}}
        <br>
        {{$publicacion->tituloEvento}}
        <br>
        {{$publicacion->tematicaEvento}}
        <br>
        {{$publicacion->descripcionEvento}}
        <br>
        {{$publicacion->enlaceEvento}}
        <br>
        Fecha del evento {{$publicacion->fechaEvento}}
      </p>
  @endforeach
    <p style="color: #FFFFFF;
    font-size: 25px;">Gracias</p>
            </div>
        </div>
    </div>
  </body>
</html>