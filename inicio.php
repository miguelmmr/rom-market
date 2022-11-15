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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
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
  

  
</head>
  <body>

    <?php include('view/navbarBeta.php');?>

    <?php include('view/slider.html');?>

    <main class="main" style="padding-top: 20px;">
      <div class="container">
        <h2 class="main-title" style="font-weight: bold; color: black">Juegos Recientes</h2>

        <section class="container-products" style="padding-top: 20px; padding-bottom: 20px;">
        <?php foreach($juegosRecientes as $juegoR){?>
          <a href="detalles.php?juego_id=<?php echo $juegoR['juego_id']?>">
          <div class="          <?php if ($juegoR['fecha_lanzamiento']> $newRelease) {echo 'product-new';}else{echo 'product';} ?> ">
            <img src="<?php echo $juegoR['direccion_imagen']; ?>" alt="" class="product__img">
            <div class="product__description">
              <h3 class="product__title"><?php echo $juegoR['nombre']; ?></h3>
              <span class="product__price">$<?php echo $juegoR['precio']; ?></span>
            </div>
            <i class="product__icon fa fa-cart-plus" style="font-size:16px" ></i>
          </div>
          </a>
        <?php } ?>
        </section>

        <h2 class="main-title" style="font-weight: bold; padding-top: 20px; color: black">Mejores Juegos</h2>

        <section class="container-products" style="padding-top: 20px;">
        <?php foreach($mejoresJuegos as $juegoM){?>
          <a href="detalles.php?juego_id=<?php echo $juegoM['juego_id']?>">
          <div class="          <?php if ($juegoM['fecha_lanzamiento']> $newRelease) {echo 'product-new';}else{echo 'product';} ?> ">
            <img src="<?php echo $juegoM['direccion_imagen']; ?>" alt="" class="product__img">
            <div class="product__description">
              <h3 class="product__title"><?php echo $juegoM['nombre']; ?></h3>
              <span class="product__price">$<?php echo $juegoM['precio']; ?></span>
            </div>
            <i class="product__icon fa fa-cart-plus" style="font-size:16px" ></i>
          </div>
          </a>
        <?php } ?>
        </section>

        <section class="container__testimonials">
          <h2 class="section__title">Recomendaciones</h2>
          <h3 class="testimonial__title">SNAKE </h3>
          <p class="testimonial__txt">En el juego, el jugador o usuario controla una larga y delgada criatura, semejante a una serpiente, que vaga alrededor de un plano delimitado, recogiendo alimentos (o algún otro elemento), tratando de evitar golpearse contra su propia cola o las "paredes" que rodean el área de juego. Cada vez que la serpiente se come un pedazo de comida, la cola crece más, provocando que aumente la dificultad del juego. El usuario controla la dirección de la cabeza de la serpiente (arriba, abajo, izquierda o derecha) y el cuerpo de la serpiente la sigue. Además, el jugador no puede detener el movimiento de la serpiente, mientras que el juego está en marcha.</p>
        </section>
      
        <div class="container-editor">
          <div class="editor__item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUTzwuibJ6G068IOsY5S6r1e3G2-kg5tgfPg&usqp=CAU" alt="" class="editor__img">
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
            <p class="tip__txt">Spider-Man, traducido en ocasiones como El Hombre Araña,11​12​ es un personaje creado por los estadounidenses Stan Lee y Steve Ditko,13​14​ e introducido en el cómic Amazing Fantasy n.° 15, publicado por Marvel Comics en agosto de 1962.15​ Se trata de un superhéroe que emplea sus habilidades sobrehumanas, reminiscentes de una araña, para combatir a otros supervillanos que persiguen fines siniestros.</p>
            <a href="" class="btn-shop">COMPRA AHORA</a>
          </div>
          <div class="tip">
           <i class="fas fa-rocket"></i>
            <h2 class="tip__title">POKEMON RUBI</h2>
            <p class="tip__txt">Pokémon Edición Rubí y Pokémon Edición Zafiro (en inglés: Pokémon Ruby Version & Sapphire Version), conocidos en Japón como Pocket Monsters Ruby & Sapphire (ポケットモンスター ルビー & サファイア Poketto Monsutā Rubī & Safaia?), son dos videojuegos del género RPG pertenecientes a la tercera generación de la saga Pokémon, y los primeros en su tipo lanzados para la consola portátil Game Boy Advance de Nintendo. Ambos, marcan el principio de la tercera generación de la serie, y se ambientan en una nueva región denominada Hoenn.</p>
            <a href="" class="btn-shop">COMPRA AHORA</a>
          </div>
          <div class="tip">
            <i class="fas fa-cog"></i>
            <h2 class="tip__title">MARIO BROS</h2>
            <p class="tip__txt">Super Mario Bros. fue el juego que popularizó al personaje de Mario,4​ convirtiéndolo en el ícono principal de Nintendo, y uno de los personajes más reconocidos de los videojuegos, así como su hermano menor Luigi. Además, presentó por primera vez a la Princesa Peach Toadstool, Toad, Bowser, entre otros personajes. Este juego es considerado el primer videojuego de plataformas de desplazamiento lateral de Nintendo y se ha convertido en un hito debido a la trascendencia de su diseño y papel en la industria de los videojuegos. </p>
            <a href="" class="btn-shop">COMPRA AHORA</a>
          </div>
        </section>
      </div>
    </main>
    
    <?php include('view/footer.html')?>

  </body>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="scripts/navbarTest3.js" ></script>
</html>

?>