<?php require_once('header.php');?>
<?php ini_set("display_errors","0");?>
<?php $movies = json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->movies;?>
<?php
// impartim filmele pe categorii
        $genreGet=$_GET['genre'];
        if(isset($genreGet)&& $genreGet && $genreGet !=""){
            echo '<h1 class="genremovie">';
            echo  "Filme din genul: $genreGet";
            echo '</h1>';
            function get_movie_genre ($element){
                global $genreGet;
                if(in_array($genreGet, $element->genres)){
                    return TRUE;
                }else{
                    return FALSE;
                }
            }
            $moviesFiltrate=array_filter($movies, "get_movie_genre");
            if(count($moviesFiltrate)>0){
                $movies=$moviesFiltrate;  
            }
        }
?>

<section>
<?php foreach($movies as $element){ ?>
<?php include('archive-movie.php') ?>
<?php } ?>
</section>
