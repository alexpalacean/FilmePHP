<?php include ('header.php'); ?>
<?php
$genres = json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->genres;
?>
<div class="genres">
<?php foreach($genres as $element){ ?>
<a href="archive.php?genre=<?php echo $element; ?>" class="genre" style="background-color:#2425<?php echo rand(10,99) ?>">
<?php echo $element;?>
</a>
<?php  } ?>
</div>
