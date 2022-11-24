
<div class="stars">
<?php

//$rating = 4.1;

$listaRangos = [0.75, 1.25, 1.75, 2.25, 2.75, 3.25, 3.75, 4.25, 4.75, 5.25];
$i=0;
while ($listaRangos[$i] <= $rating){
    $i++;
}
$rating = $listaRangos[$i] - 0.25;

$cantStars = 1; 

while ($cantStars <= 5 ){

    if($cantStars <= $rating){
        ?><span class="fa fa-star checked"></span><?php
    }
    else{
        if($cantStars-0.5 == $rating){
            ?><span class="fa fa-star-half-o checked"></span><?php
        }
        else{
            ?><span class="fa fa-star"></span><?php
        }
    }

    
    $cantStars++;
}

if ($rating<1)
?>

</div>
