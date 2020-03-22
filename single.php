<?php include ('header.php'); ?>
<body class="bodymovie">
<?php ini_set("display_errors","0");?>
<?php
$movies = json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->movies;
// afisam toate detaliile filmului atunci cand se apasa butonul cu Mai multe detalii
$movieId=$_GET['movie_id'];
if(isset($movieId)&& $movieId && $movieId !=""){
    function get_movie($value){
        global $movieId;
        if($movieId==$value->id){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    $moviesFiltrate=array_filter($movies, "get_movie", ARRAY_FILTER_USE_BOTH);
    if(count($moviesFiltrate)>0){
        $movie= reset($moviesFiltrate);
    }else{ ?>
        Nu exista acest film. Mergi <a href="archive.php">inapoi la arhiva</a>
 <?php   }
}?>


<div class="row">
<?php
    $external_link = $movie-> posterUrl;
    if (@GetImageSize($external_link)) {
        echo '<img class="poster" src='.$external_link.'>';
    }else{
        echo '<img class="poster" src="images/placeholder.jpg" alt="no photo here:(">';
}?>
    <br>
 

<h1 class="title">
<?php echo $movie->title;?>
</h1>
<div>
<strong>Anul lansării:</strong> <?php echo $movie-> year;?><br>
<strong>Durata filmului: </strong><?php echo $movie-> runtime;?> de minute<br>
<strong>Gen film: </strong><?php print implode ( ", ", $movie-> genres);?><br>
<strong>Regizor: </strong><?php echo $movie-> director;?><br>
<strong>Actori: </strong><?php echo $movie-> actors;?><br>
<strong>Sinopsis film: </strong><?php echo $movie-> plot;?><br>
</div>
<br>

<strong>NOTA FILM:</strong>
    <form method="post" action="single.php?movie_id=<?php echo $movie-> id; ?>">
    <input type="radio" name="rating" value="1">1
    <input type="radio" name="rating" value="2">2
    <input type="radio" name="rating" value="3">3
    <input type="radio" name="rating" value="4">4
    <input type="radio" name="rating" value="5">5
    <input type="submit" class="submit" name="submit" value="Submit">
    </form>
    <?php
   
   if(!isset($_POST['rating'][$movie-> id])){
   $userChoice= json_decode(file_get_contents('movies_rating.txt'),TRUE);
   }
   if(!empty($_POST['rating'])){

   if( 0 == filesize('movies_rating.txt')){
       $userChoice=array();
       $userChoice[$movie->id]=array();           
   }elseif( 1 == filesize('movies_rating.txt'))
       $userChoice[$movie->id]=array();

       $userChoice[$movie->id][]=$_POST['rating'];
     
       file_put_contents( 'movies_rating.txt' , json_encode($userChoice , JSON_PRETTY_PRINT) );
   }
    $media=$userChoice[$movie->id];
    $average = array_sum($media) / count($media);
   if(!isset($userChoice[$movie->id])){
       echo "Fii primul care acorda o notă acestui film";
   }else{
       echo "Media notelor:".(round($average, 2));
   }

?>
</body>