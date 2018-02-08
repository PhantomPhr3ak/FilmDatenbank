<?php
    function getHeaderStandart()
    {
        getHeadTag()
        ?>
        <html>
        <body>
            <div class="navbar sticky-top navbar-expand-lg navbar-light bg-dark navbar-dark justify-content-between">
                <a href="index.php" class="navbar-brand">Movies.io</a>
                <a href="database.php" class="nav-item">Datenbank</a>
                <div class="form-inline">
                    <?php
                        if(isLoggedIn())
                            {
                                echo 'Logged in as ' . getUsername() . '
                        <a href="index.php?logout=true" class="btn btn-success" style="margin-left: 0.5rem">
                        <img src="open-iconic-master/svg/account-logout.svg" id="login-img" style="margin-right: 0.5rem;">
                    </a>';
                            }
                        else
                            {
                                echo '<a href="login.php" class="btn btn-warning">
                        <img src="open-iconic-master/svg/account-login.svg" id="login-img" style="margin-right: 0rem">
                        Sign in!
                    </a>';
                            }
                    ?>
                </div>
            </div>
        </body>
        </html>
        
        
        <?php
    }
    
    function isLoggedIn()
    {
        //Returns true if user is logged in
        if(isset($_SESSION['userid']))
            {
                return true;
            }
        else
            {
                return false;
            }
    }
    
    function logIn()
    {
        if(!isset($_SESSION['userid']) && isset($_POST['username']) && isset($_POST['password']) && !isset($_POST['remember-me']))
            {
                if(!$_POST['remember-me'])
                    {
                        $userName = $_POST['username'];
                        $userPassword = $_POST['password'];
                        
                        //Encrypt password
                        $userPassword = md5($userPassword);
                        
                        //Get connection to database
                        $mysqli = new mysqli("localhost", "filme", "filme", "FilmDatenbank", "8889");
                        
                        //Define and execute query
                        $sql = "SELECT * FROM t_User WHERE c_Name = ?";
                        $statement = $mysqli->prepare($sql);
                        $statement->bind_param('s', $userName);
                        $statement->execute();
                        $res = $statement->get_result();
                        
                        
                        //Check results
                        if($zeile = $res->fetch_object())
                            {
                                if($zeile->c_Passwort == $userPassword)
                                    {
                                        $_SESSION['userid'] = $zeile->c_ID;
                                        $_SESSION['userName'] = $userName;
                                        return true;
                                    }
                            }
                        return false;
                    }
            }
    }
    
    function getHeadTag()
    {
        session_start();
        ?>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Movies.io</title>
            
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            
            <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"
                  integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy"
                  crossorigin="anonymous">
            <link rel="stylesheet" href="Custom.css">
        </head>
        </html>
        <?php
    }
    
    function newAccount()
    {
        if(!isset($_SESSION['userid']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['remember-me']))
            {
                $userName = $_POST['username'];
                $password = md5($_POST['password']);
                
                
                $mysqli = new mysqli("localhost", "filme", "filme", "FilmDatenbank");
                if($mysqli->connect_errno)
                    {
                        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
                    }
                
                
                //Check if username already exists
                $sql = "SELECT c_Name FROM t_User WHERE c_Name = ?";
                $statement = $mysqli->prepare($sql);
                $statement->bind_param('s', $userName);
                $statement->execute();
                
                if(!$statement->get_result())
                    {
                        
                        $statement->close();
                        
                        //Insert data
                        echo "check1";
                        $sql = "INSERT INTO t_User (c_Name, c_Passwort) VALUES ( ? , ? )";
                        $statement = $mysqli->prepare($sql);
                        $statement->bind_param('ss', $userName, $password);
                        $statement->execute();
                        $statement->insert_id;
                        
                    }
                else
                    {
                        return '<div class="alert alert-danger">Es ist ein Fehler aufgetreten. Mögliche Gründe: <br><ul><li>Sie sind bereits angemeldet</li><li>Sie haben nicht alle Felder ausgefüllt</li></ul></div>';
                    }
                
                //Close everything
                $statement->close();
                $mysqli->close();
                return true;
            }
        else
            {
                return '<div class="alert alert-danger">Es ist ein Fehler aufgetreten. Mögliche Gründe: <br><ul><li>Sie sind bereits angemeldet</li><li>Sie haben nicht alle Felder ausgefüllt</li></ul></div>';
            }
    }
    
    function logout()
    {
        if($_GET['logout'] == "true")
            {
                session_destroy();
                return true;
            }
        return false;
    }
    
    function getUsername()
    {
        if(isLoggedIn())
            {
                return $_SESSION['userName'];
            }
    }
    
    function searchForFilm()
    {
        //Get connection to database
        //TODO implement youtube trailers
        
        if(isset($_GET['search']))
            {
                $input = '%' . $_GET['search'] . '%';
                
                $sql = "SELECT
                        t_Film.c_ID AS film_ID,
                        t_Film.c_Name AS film_Name,
                        t_Film.c_Erscheinungsdatum AS film_ED,
                        c_Vorname AS reg_Vorname,
                        c_Nachname AS reg_Nachname,
                        t_Produktionsunternehmen.c_Name AS p_Name,
                        t_Produktionsunternehmen.c_Unternehmensform AS p_Uf,
                        c_Beschreibung AS film_Beschreibung,
                        c_Trailer AS film_Trailer
                    FROM t_Film
                        LEFT JOIN t_Regisseur ON c_Regisseur = t_Regisseur.c_ID
                        LEFT JOIN t_Produktionsunternehmen ON c_Produktionsunternehmen = t_Produktionsunternehmen.c_ID
                    WHERE
                        t_Film.c_Name LIKE ?";
                
                $mysqli = new mysqli("localhost", "filme", "filme", "FilmDatenbank", "8889");
                $statement = $mysqli->prepare($sql);
                $statement->bind_param("s", $input);
                $statement->execute();
                $res = $statement->get_result();
                
                
                while ($zeile = $res->fetch_object())
                    {
                        echo '
                <div class="p-5 m-3 row bg-light">
                    <div class="row">
                        <div class="col-12 text-dark">
                            <h2 class="Display-4">' . $zeile->film_Name . '</h2>
                            <p class="lead">Erscheinungsjahr: ' . $zeile->film_ED . '</p>
                            <p class="lead">
                                Regisseur: ' . $zeile->reg_Vorname . ' ' . $zeile->reg_Nachname . '<br>
                                Producer: ' . $zeile->p_Name . ' ' . $zeile->p_Uf . '
                            </p>
                            <p class="lead">Beschreibung: ' . $zeile->film_Beschreibung . '</p>
                        </div>
                        ';
                        //Überprüfen, ob Trailer vorhanden
                        if($zeile->film_Trailer){
                            echo '
                        <div class="col-12 ">
                            <iframe src=' . $zeile->film_Trailer . ' width="560" height="315" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>';
                        }
                        echo '
                    </div>
                    <div class="row">
                        <div class="col-12">
                            ';
                        
                        $sql2 = "
                            SELECT
                              c_ID,
                              c_Text,
                              c_Verfasser,
                              c_Datum,
                              c_Film
                            FROM
                              t_Kommentare
                            WHERE
                              c_Film = ?;
                        ";
                        $statement2 = $mysqli->prepare($sql2);
                        $statement2->bind_param('i', $zeile->film_ID);
                        $statement2->execute();
                        $res2 = $statement2->get_result();
                        
                        while($res2->fetch_object()){
                            echo '
                            <div class="row">
                            
                            </div>
                            ';
                        }
                        echo'
                        </div>
                    </div>
                </div>
                ';
                    
                    }
            }
    }

?>