<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/ini.css">
    <title>
</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">pokedesk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">busqueda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vista.php">guardados</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<center>
<br>
<br>

<form  class="" action="index.php" method="post">
<?php
$d=rand(1,802);
$pockemon=$d;
$api= curl_init("https://pokeapi.co/api/v2/pokemon/$pockemon");
curl_setopt($api,CURLOPT_RETURNTRANSFER,true);
$response=curl_exec($api);
curl_close($api);
$json=json_decode($response);

 ?>

 <div class="card" style="width: 18rem;">
 <?php echo '<img src="'.$json->sprites->front_default.'" width="200">';?>
   <div class="card-body">
      <h5 class="card-title"> NOMBRE: <?php echo $json->species->name; ?></h5>
       <p class="card-text">HABILIDADES:<br> <?php
       echo $json->types[0]->type->name;
       foreach ($json->abilities as $k=>$v) {
       echo $v->ability->name."<br>";
       }
      ?></p>
      <a href="index.php" class="btn btn-primary">mostrar pockemon</a>
  </div>
 </div>
 </form>
  </body>

  <footer>
    <svg xmlns="http://www.w3.org/2000/svg" width="16"  height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
    </svg>
&#169; 2022 Edgar morales
  </footer>
</html>
