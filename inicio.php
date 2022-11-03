<?php
  require_once('controller/juego.controller.php');
  $juegoC = new JuegoController;
  $juegosRecientes = $juegoC->ObtenerTableJuegosRecientes();  

  $currentYear = date("Y");
  $currentMonth = date("m");
  $currentDay = date("d");

  $MESES_NUEVO = 1;

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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rom Market</title>
  <link rel="stylesheet" type="text/css" href="normalize.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:500">
  <link rel="stylesheet" type="text/css" href="styles/inicioStyle.css">

  
</head>
  <body>
    
    <?php include('view/navbar.php')?>

    <div class="container-slider">
      <div class="slider" id="slider">
        <div class="slider__section">
          <img src="https://www.callofduty.com/content/dam/atvi/callof…b/main-tout/2022/09/9-27-hub-s5-5-announce-sm.jpg"  class="slider__img">
          <div class="slider__content">
            <h2 class="slider__title">Dota 2</h2>
            <p class="slider__txt">sale 50% off</p>
            <a href="" class="btn-shop">SHOP NOW</a>
          </div>
        </div>
        <div class="slider__section">
          <img src="https://i.blogs.es/de368e/dota-2-wallpaper/1366_2000.jpg" alt="" class="slider__img">
          <div class="slider__content">
            <h2 class="slider__title">Dota 2</h2>
            <p class="slider__txt"> sale 50% off</p>
            <a href="" class="btn-shop">SHOP NOW</a>
          </div>
        </div>

      <div class="slider__btn slider__btn--right" id="btn-right">&#62;</div>
      <div class="slider__btn slider__btn--left" id="btn-left">&#60;</div>
    </div>
    <main class="main">
      <div class="container">
        <h2 class="main-title">Juegos Recientes</h2>

        <section class="container-products">
        <?php foreach($juegosRecientes as $juego){?>
          <div class="          <?php if ($juego['fecha_lanzamiento']> $newRelease) {echo 'product-new';}else{echo 'product';} ?> ">
            <img src="<?php echo $juego['direccion_imagen']; ?>" alt="" class="product__img">
            <div class="product__description">
              <h3 class="product__title"><?php echo $juego['nombre']; ?></h3>
              <span class="product__price">$<?php echo $juego['precio']; ?></span>
            </div>
            <i class="product__icon fas fa-cart-plus"></i>
          </div>
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
</html>

?>