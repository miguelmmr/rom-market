<?php
  session_start();

  require_once('controller/juego.controller.php');
  $juegoC = new JuegoController;
  $juegosRecientes = $juegoC->ObtenerTableJuegosRecientes(); 
  $mejoresJuegos = $juegoC->ObtenerTableMejoresJuegos();  

  $currentYear = date("Y");
  $currentMonth = date("m");
  $currentDay = date("d");

  $MESES_NUEVO = 5;

  if($currentMonth - $MESES_NUEVO <= 0){
    $currentYear -=1;
    $currentMonth = 12 + $currentMonth - $MESES_NUEVO;
  }
  else{
    $currentMonth -=$MESES_NUEVO;
  }
  $newRelease =  $currentYear . "-" . $currentMonth . "-" . $currentDay;

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css"
    integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="styles/navbarBetaStyle.css">
  <link rel="stylesheet" type="text/css" href="styles/sliderStyle.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rom Market</title>
  <link rel="stylesheet" type="text/css" href="normalize.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:500">
  <link rel="stylesheet" type="text/css" href="styles/inicioStyle.css">
  <link rel="stylesheet" type="text/css" href="styles/tests/listaJuegosStyle.css">
  <link rel="stylesheet" href="styles/detallesTestStyle.css" rel="stylesheet">



</head>

<body>

  <?php include('view/navbarBeta.php');?>

  <?php include('view/slider.php');?>

  <main class="main" style="padding-top: 20px;">
    <div class="container">
      <h2 class="main-title" style="font-weight: bold; color: white">Juegos Recientes</h2>

      <section class="container-products" style="padding-top: 20px; padding-bottom: 20px;">
        <?php foreach($juegosRecientes as $juegoR){?>
        <div
          class="          <?php if ($juegoR['fecha_lanzamiento']> $newRelease) {echo 'product-new';}else{echo 'product';} ?>"
          style="background-color:rgb(0,0,0,0.3)">
          <a href="detalles.php?juego_id=<?php echo $juegoR['juego_id']?>">
            <img src="<?php echo $juegoR['direccion_imagen']; ?>" alt="" class="product__img">
          </a>
          <div class="d-flex flex-column justify-content-start mt-3">
            <h3 class="text-light align-self-start"><?php echo $juegoR['nombre']; ?></h3>
            <div class="d-flex align-items-center">
              <div class="bg-dark d-flex align-items-center p-3" style="border-radius:12px">
                <h4 class="bg-dark text-light">S/.<?php echo $juegoR['precio']*(100-$juegoR['promocion'])/100;?></h4>
                <div class="dropdown bg-dark ml-2">
                  <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-expanded="false">
                  </button>
                  <div class="dropdown-menu bg-dark">
                    <a class="dropdown-item" href="agregarWishlist.php?juegoId=<?php echo $juego['juego_id']?>"><i
                        class="fa fa-heart" style="font-size:16px; color:red"></i></a>
                    <a class="dropdown-item" href="agregarCarro.php?juegoId=<?php echo $juego['juego_id']?>"><i
                        class="fa fa-cart-plus" style="font-size:16px; color:green"></i></a>
                  </div>
                </div>
              </div>
              <div class="ml-2">
                <?php if ($juegoR['promocion'] != 0){ ?>
                <h4 class="strike-text">S/.<?php echo $juegoR['precio'];?></h4>
                <?php } ?>
              </div>
            </div>

          </div>
        </div>
        <?php } ?>
      </section>

      <h2 class="main-title" style="font-weight: bold; padding-top: 20px; color: white">Mejores Juegos</h2>

      <section class="container-products" style="padding-top: 20px;">
        <?php foreach($mejoresJuegos as $juegoM){?>

        <div
          class="          <?php if ($juegoM['fecha_lanzamiento']> $newRelease) {echo 'product-new';}else{echo 'product';} ?>"
          style="background-color:rgb(0,0,0,0.3)">
          <a href="detalles.php?juego_id=<?php echo $juegoM['juego_id']?>">
            <img src="<?php echo $juegoM['direccion_imagen']; ?>" alt="" class="product__img">
          </a>
          <div class="d-flex flex-column justify-content-start mt-3">
            <h3 class="text-light align-self-start"><?php echo $juegoM['nombre']; ?></h3>
            <div class="d-flex align-items-center">
              <div class="bg-dark d-flex align-items-center p-3" style="border-radius:12px">
                <h4 class="bg-dark text-light">$<?php echo $juegoM['precio']; ?></h4>
                <div class="dropdown bg-dark ml-2">
                  <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-expanded="false">
                  </button>
                  <div class="dropdown-menu bg-dark">
                    <a class="dropdown-item" href="agregarWishlist.php?juegoId=<?php echo $juego['juego_id']?>"><i
                        class="fa fa-heart" style="font-size:16px; color:red"></i></a>
                    <a class="dropdown-item" href="agregarCarro.php?juegoId=<?php echo $juego['juego_id']?>"><i
                        class="fa fa-cart-plus" style="font-size:16px; color:green"></i></a>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

        <?php } ?>
      </section>

      <section class="container__testimonials">
        <h2 class="section__title">Recomendaciones</h2>
        <h3 class="testimonial__title">SNAKE </h3>
        <p class="testimonial__txt">En el juego, el jugador o usuario controla una larga y delgada criatura, semejante a
          una serpiente, que vaga alrededor de un plano delimitado, recogiendo alimentos (o alg??n otro elemento),
          tratando de evitar golpearse contra su propia cola o las "paredes" que rodean el ??rea de juego. Cada vez que
          la serpiente se come un pedazo de comida, la cola crece m??s, provocando que aumente la dificultad del juego.
          El usuario controla la direcci??n de la cabeza de la serpiente (arriba, abajo, izquierda o derecha) y el cuerpo
          de la serpiente la sigue. Adem??s, el jugador no puede detener el movimiento de la serpiente, mientras que el
          juego est?? en marcha.</p>
      </section>

      <div class="container-editor">
        <div class="editor__item">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUTzwuibJ6G068IOsY5S6r1e3G2-kg5tgfPg&usqp=CAU"
            alt="" class="editor__img">
          <p class="editor__circle">EXPRESS YOUR STYLE NOW</p>
        </div>
        <div class="editor__item">
          <img src="https://volsiz.ru/wp-content/uploads/2022/05/best-unblocked-snake-games-2022_627ea44e9e116.jpeg">
          <p class="editor__circle">EXPRESS YOUR STYLE NOW</p>
        </div>
      </div>
      <section class="container-tips">
        <div class="tip">
          <i class="far fa-hand-paper"></i>
          <h2 class="tip__title">SPIDER MAN</h2>
          <p class="tip__txt">Spider-Man, traducido en ocasiones como El Hombre Ara??a,11???12??? es un personaje creado por
            los estadounidenses Stan Lee y Steve Ditko,13???14??? e introducido en el c??mic Amazing Fantasy n.?? 15,
            publicado por Marvel Comics en agosto de 1962.15??? Se trata de un superh??roe que emplea sus habilidades
            sobrehumanas, reminiscentes de una ara??a, para combatir a otros supervillanos que persiguen fines
            siniestros.</p>
          <a href="" class="btn-shop">COMPRA AHORA</a>
        </div>
        <div class="tip">
          <i class="fas fa-rocket"></i>
          <h2 class="tip__title">POKEMON RUBI</h2>
          <p class="tip__txt">Pok??mon Edici??n Rub?? y Pok??mon Edici??n Zafiro (en ingl??s: Pok??mon Ruby Version & Sapphire
            Version), conocidos en Jap??n como Pocket Monsters Ruby & Sapphire (??????????????????????????? ????????? & ??????????????? Poketto Monsut??
            Rub?? & Safaia?), son dos videojuegos del g??nero RPG pertenecientes a la tercera generaci??n de la saga
            Pok??mon, y los primeros en su tipo lanzados para la consola port??til Game Boy Advance de Nintendo. Ambos,
            marcan el principio de la tercera generaci??n de la serie, y se ambientan en una nueva regi??n denominada
            Hoenn.</p>
          <a href="" class="btn-shop">COMPRA AHORA</a>
        </div>
        <div class="tip">
          <i class="fas fa-cog"></i>
          <h2 class="tip__title">MARIO BROS</h2>
          <p class="tip__txt">Super Mario Bros. fue el juego que populariz?? al personaje de Mario,4??? convirti??ndolo en
            el ??cono principal de Nintendo, y uno de los personajes m??s reconocidos de los videojuegos, as?? como su
            hermano menor Luigi. Adem??s, present?? por primera vez a la Princesa Peach Toadstool, Toad, Bowser, entre
            otros personajes. Este juego es considerado el primer videojuego de plataformas de desplazamiento lateral de
            Nintendo y se ha convertido en un hito debido a la trascendencia de su dise??o y papel en la industria de los
            videojuegos. </p>
          <a href="" class="btn-shop">COMPRA AHORA</a>
        </div>
      </section>
    </div>
  </main>

  <?php include('view/footer.html')?>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="scripts/navbarTest3.js"></script>

</html>

?>