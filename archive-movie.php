<body class="bodymovie">
<div class="row">
<ul>
    <li class="lista1">
    <?php
    // verificare daca exista imaginea; iar daca nu exista il inlocuim cu un placeholder
        $external_link = $element->posterUrl;
        if (@GetImageSize($external_link)) {
            echo '<img class="poster" src='.$external_link.'>';
        } else {
            echo '<img class="poster" src="images/placeholder.jpg" alt="no photo here:(">';
        }?>
    <br>
    <h2 class="title"><?php echo $element-> title; ?></h2> <br>
    <p>Anul aparitiei: <?php if($element->year>=2010){?>
        <strong><?php echo $element->year ?></strong>
    <?php } else{ ?>
        <?php echo $element->year ?>
    <?php } ?></p> <br>
    <p>Descriere film: <?php if(strlen($element-> plot)>100){
        echo substr($element-> plot, 0,100).'...';
    }else{
        echo $element-> plot;
    } ?></p> <br>

    <p>Gen: <?php print implode ( ", ", $element-> genres);?></p><br>

    
    <?php
    // calculam cel mai lung film
    $movieRuntime=array_column($movies,'runtime');
    $moviesRuntimeMax= max($movieRuntime); 
    ?>

    <?php   
    $runtime= $element->runtime;
    $hours = floor($runtime / 60);
    $minutes = ($runtime % 60);
        if($hours<2){
            echo "Durata filmului: $hours oră";
        }else{
            echo "Durata filmului: $hours ore";
        }
        if($minutes==1){
            echo " si $minutes minut";
        }
        if($minutes>2 & $minutes<=19){
            echo " si $minutes minute"; 
        }
        if($minutes>19){
            echo " si $minutes de minute";
        }
    ?>

    <div class="runtime-bar">
        <div class="">
            <div class="" style="width: <?php echo $element->runtime * 100 / $moviesRuntimeMax; ?>%">
            </div>
        </div>
        <p>Durata acestui film reprezintă <?php echo number_format((float) $element->runtime * 100 / $moviesRuntimeMax, 2, '.', '') ?>% din lungimea celui mai lung film(229)</p> 
    </div>
    <br>

    <p>Actori:
    <?php
    $actors= $element->actors;
    $actoriArr= explode(',' , $actors);
    $list = implode(', ', $actoriArr); 
    print_r($list);      
   ?></p>
 
    <button class="buton">
        <a href="single.php?movie_id=<?php echo $element->id; ?>" class="button"> Mai multe detalii </a>
    </button>
    </li>
    </ul>
    </div>
</body>






