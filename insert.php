<?php
    /**
     * Created by PhpStorm.
     * User: kai
     * Date: 01.02.18
     * Time: 12:47
     */
    
    if(!isLoggedIn()){
        header('Location: index.php');
        die();
    }
    getHeaderStandart();
?>
<html>
<body>
    <form>
        <input name="film_Name">
        <input name="film_Datum">
        <input name="film_Beschreibung">
        <input type="text" name="film_Trailer">
    </form>
</body>
</html>