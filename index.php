<?php
    include('functions.php');
    //Checks itself if checkout is set
    
    getHeaderStandart();
    logout();
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div id="picture-top">
        <div id="picture-top-content">
            <h1>Movies.io</h1>
            <p>Find the best movies at Movies.io</p>
        </div>
    </div>

    <div id="feature-one">
        <div class="row">
            <div class="col-xl-2">
            
            </div>
            <div class="col-12 col-lg-6 col-xl-4" id="feature-one-div">
                <h3>Great Movie!</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, quas non! Obcaecati sint maiores aspernatur unde enim veniam eveniet ducimus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia asperiores quisquam consectetur, expedita sapiente adipisci et sunt qui natus similique error dolores.
                </p>
            </div>
            <div class="col-12 col-lg-6 col-xl-4">
                <img src="91gT2l0U-dL._SL1500_.jpg" alt="Film">
            </div>
            <div class="col-xl-2">
            
            </div>
        </div>
    </div>

    <div id="feature-two" class="text-center">
        <h1>Take a look at our Database!</h1>
        <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab tenetur dicta voluptas sunt asperiores quae, qui ipsum vitae natus repellat.</p>
        <a href="database.php" class="btn btn-primary">Hier klicken</a>
    </div>
    
    <section class="row" id="feature-three">
        <div class="col-12 col-lg-6 jumbotron" id="feature-three-left">
            <h2 class="display-6">Lorem ipsum</h2>
            <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab tenetur dicta voluptas sunt asperiores quae, qui ipsum vitae natus repellat.</p>
        </div>
        <div class="col-12 col-lg-6 jumbotron" id="feature-three-right">
            <h2 class="display-6">Deshalb Movies.io</h2>
            <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab tenetur dicta voluptas sunt asperiores quae, qui ipsum vitae natus repellat.</p>
        </div>
    </section>
    
    <section class="row" id="feature-three">
        <div class="col-12 col-lg-6 jumbotron" id="feature-three-right">
            <h2 class="display-6">Lorem ipsum</h2>
            <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab tenetur dicta voluptas sunt asperiores quae, qui ipsum vitae natus repellat.</p>
        </div>
        <div class="col-12 col-lg-6 jumbotron" id="feature-three-left">
            <h2 class="display-6">Deshalb Movies.io</h2>
            <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab tenetur dicta voluptas sunt asperiores quae, qui ipsum vitae natus repellat.</p>
        </div>
    </section>

    <footer>
        <div class="text-center">
            <p>Email: info@movies.io Tel: 12345/67890</p>
            <a class="Text-primary">Impressum</a>
            <p id="copyright">&copy;Copyright by Movies.io</p>
        </div>
    </footer>

    <script src="node_modules/jquery/dist/jquery.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="node_modules/popper.js/dist/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>

</html>