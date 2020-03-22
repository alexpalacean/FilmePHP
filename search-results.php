<?php require_once('header.php');?>
<?php $movies = json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->movies;
// afisam rezultatele cautarii din campul Search
        $movieTitle=ucfirst(strtolower($_GET['search']));
        $searchGet=$_GET['search'];
        if($movieTitle){
            echo '<h1>';
            echo "Rezultatele căutării pentru: $movieTitle";
            echo '</h1>';
            function get_search($element){
                global $movieTitle;
                if(strstr($element->title, $movieTitle)){
                    return TRUE;
                }else{
                    return FALSE;
                }
            }

            $searchFiltrate=array_filter($movies, "get_search", ARRAY_FILTER_USE_BOTH);
            if(count($searchFiltrate)>0){
                foreach($searchFiltrate as $element){
                    include('archive-movie.php');
                }
            }else{ ?>
                Nu exista acest film. Incercati sa scrieti din nou numele filmului.
         <?php }
}?>