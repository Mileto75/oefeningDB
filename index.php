<?php
include 'includes/header.php';
if(isset($_POST['submit']))
{
    //haal de gegevens op en sanitize/validate
    $username = sanitize_email($_POST['username']);
    $passw = sanitize_data($_POST['passw']);
    if($username && $passw)
    {
        //authenticate
        //connect to dbase
        $dbConn = new DB();
        if($dbConn)
        {
            $query = "SELECT * FROM tbl_users WHERE username=:username";
            $params = array(":username" => $username);
            $result = $dbConn->runPreparedQuery($query,$params);
            if($result)
            {
               foreach ($result as $res)
                {
                    if($res->username == $username && password_verify($passw,$res->passw))
                    {
                        echo 'passw'.$passw;
                        //maak sessievars aan
                        $_SESSION['username']       = $username;
                        $_SESSION['naam']           = $res->name;
                        $_SESSION['vnaam']          = $res->fname;
                        $_SESSION['authenticated']  = true;
                        //redirect to homepage
                        header("Location:movies.php");
                    }
                    else
                    {
                        user_not_exists();
                    }
                }
            }
            else
            {
                user_not_exists();
            }
        }
        else
        {
            die("Kan niet connecteren met Dbase");
        }


    }
}
else
{
?>
    <div class="container">
        <?php
        if(isset($_SESSION['message']) && $_SESSION['message'] != "")
        {
            ?>
            <div class="alert alert-danger" role="alert">
                <h4><?php echo $_SESSION['message']; ?></h4>
            </div>
            <?php
        }
        ?>
        <form class="form-signin" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <h2 class="form-signin-heading">Log in</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="username" type="email" id="inputEmail" class="form-control" placeholder="Email address"
                   required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="passw" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

            <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Go</button>
        </form>
    </div>
<?php
}
include '../includes/footer.php';