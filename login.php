<?php
    session_start();
    if(isset($_SESSION["Nome_Utente"]))
    {
        header("Location: home.php");
        exit;
    }
    if(isset($_POST["Nome_Utente"]) && isset($_POST["Password"]))
    {
        $conn = mysqli_connect("localhost", "root", "", "web");
        $query = "SELECT * FROM utente WHERE id = '".$_POST["Nome_Utente"]."' AND password = '".$_POST["Password"]."'";
        $res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res) > 0)
        {
            $_SESSION["Nome_Utente"] = $_POST["Nome_Utente"];
            
            if(isset($_POST['ricordami']) == 1 )
            {
                setcookie("username",$_POST['Nome_Utente'],time () + (15000));
            }
            
            
            header("Location: home.php");
            exit;
        }
        else
        {
            
            $errore = true;
        }

    }

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='login.css?v=<?php echo time(); ?>'>
        <script src='controllo_login.js?v=<?php echo time(); ?>' defer></script>
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Login TRMN
        </title>
    </head>
    
    <body>
        <h1> Effettua il login ed inizia a condividere contenuti col resto della comunity.</h1>
        <main>
            <div class="form">
            <form name='form_login' method='post'>
                <p>
                    <label>Nome utente: <input type='text'  value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" name='Nome_Utente'></label>
                </p>
                <p>
                    <label>Password: <input type='password' name='Password'></label>
                </p>
                <p>
                    <label>Ricorda i miei dati: <input type='checkbox' name='ricordami'> </label>
                </p>
                <p>
                    <label>&nbsp;<input type='submit' value="login"></label>
                </p>
            </form>
        </div>
        </main>
        <p class="signup"> Non hai ancora un account? </br> <a href="signup.php">Registrati ora!</a></p>
        <footer>
            <h5>Powered by Carlo Castorina 1000002023</h5> 
        </footer>
    </body>
</html>