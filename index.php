<?php require_once('header.php');?>
<?php $movies = json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->movies;?>
<?php $nrfilme=count($movies);?>
<br>
<?php $genres = json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->genres;?>
<?php $nrgenuri=count($genres);?>
<body class="index">
<div>
    <img src="images/wallpaper.jpg" alt="" class="introphoto">
</div>

<h4>Vă punem la dispoziție o bază de <?php echo $nrfilme ?> de filme împărțite pe <?php echo $nrgenuri?> de genuri. </h4>
<br>

<div class="indexdiv"><strong class="indexstrong">CELE MAI VECHI FILME</strong></div>
<br>
<div class="indexdiv2">
<?php
// sortam cele mai vechi 10 filme din array
uasort($movies, function($a, $b) {
    return $a->year > $b->year;
});
$movies1 = array_slice($movies, 0, 10);

 foreach($movies1 as $movie){
     echo '<div>';
    echo "<a class='indexlink' href='single.php?movie_id= $movie->id'> $movie->title $movie->year  <br> </a>";
      echo "<a href='single.php?movie_id= $movie->id'>";
    $external_link = $movie->posterUrl;
    if (@GetImageSize($external_link)) {
        echo '<img class="indexposter" src='.$external_link.'>';
    } else {
        echo '<img class="indexposter" src="images/placeholder.jpg" alt="no photo here:(">';
    }
    echo   "</a>";
    echo '</div>';
}
?>
</div>

<br>
<br>
<div class="indexdiv"><strong class="indexstrong">CELE MAI NOI FILME</strong></div>
<br>
<div class="indexdiv2">
<?php
// sortam cele mai noi 10 filme din array
uasort($movies, function($a, $b) {
    return $a->year > $b->year;
});
$movies1 = array_slice($movies, 136, 146);

 foreach($movies1 as $movie){
    echo '<div>';
    echo "<a class='indexlink' href='single.php?movie_id= $movie->id'> $movie->title $movie->year  <br> </a>";
    echo "<a href='single.php?movie_id= $movie->id'>";
    $external_link = $movie->posterUrl;
    if (@GetImageSize($external_link)) {
        echo '<img class="indexposter" src='.$external_link.'>';
    } else {
        echo '<img class="indexposter" src="images/placeholder.jpg" alt="no photo here:(">';
    }
    echo   "</a>";
    echo '</div>';
}?>
</div>
<body>