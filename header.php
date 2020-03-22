<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filme</title>
    <link href="style190.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Myeongjo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Marcellus+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <header>
        <a href="index.php"><img class="logo" src="images/alex.png" alt="Logo"></a>
            <nav>
            <ul class="nav">
                <li class="navigare"><a class="navigare1" href ="index.php">Home</a></li>
                <li class="navigare"><a class="navigare1" href ="archive.php">Movies</a></li>
                <li class="navigare"><a class="navigare1" href ="genres.php">Genres</a></li>
                <li class="navigare"><a class="navigare1" href ="contact.php">Contact</a></li>
            </ul>
            </nav>

            <div>
            <form class="search" action="search-results.php" method="get">
                <input type="text" class="searchTerm" placeholder="What are you looking for?" name="search">
                <a href="search-results.php"> <button type="submit" class="searchButton"><i class="fa fa-search"></i></button></a>
            </form>
        </div>
    </header>
</body>
</html>