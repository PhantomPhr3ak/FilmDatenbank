<?php
include('functions.php');
getHeaderStandart();
?>
<!DOCTYPE html>
<html lang="en">
<body>    
    <section class="jumbotron-fluid text-center" id="section-one">
        <h1 class="Display-2">Film Datenbank</h1>
        <p class="lead">Erstellt von unseren Nutzern</p>
        <a href="login.php" class="btn btn-success">Melde dich jetzt an!</a>
    </section>
    
    <div class="navbar navbar-light bg-light">
        <form method="get" action="#">
            <input type="text" name="search">
            <input type="submit" class="btn btn-success">
        </form>
    </div>
    <div class="container">
        <?php
            searchForFilm();
        ?>
    </div>
    <script src="node_modules/jquery/dist/jquery.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="node_modules/popper.js/dist/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>