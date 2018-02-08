<?php
    
    include('functions.php');
    
    //Checks if logged in
    if(logIn() || isLoggedIn()){
        header('Location: index.php');
        die();
    }
    
    
    //Loads header
    getHeadTag();
    ?>

<html>
<body id="body">
    <section id="login-container">
        <?php
            //Processing data
            

            $res = newAccount();
            if(!$res){
                echo $res;
            }
        ?>
        <form class="form-signin text-center" method="post" action="">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="username" id="username" name="username" class="form-control" placeholder="username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me" id="remember-me"> Remember me
                </label>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="register-me" id="register"> Register me now
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </section>
</body>
</html>