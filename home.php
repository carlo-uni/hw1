<?php
    
    session_start();
    
    if(!isset($_SESSION['Nome_Utente']))
    {
        
        header("Location: login.php");
        exit;
    }

    function imposta_img(){
        $conn = mysqli_connect("localhost", "root", "", "web");
        $query = "SELECT avatar FROM utente WHERE id = '".$_SESSION["Nome_Utente"]."'";
        $res = mysqli_query($conn, $query);
        $row=mysqli_fetch_assoc($res);
        $img[]=$row;
        
        $target_dir = "images/";
        return($target_dir.$img[0]["avatar"]);
        }
    
?>



<!DOCTYPE html>
<html>
    <head>
    <script src='home.js?v=<?php echo time(); ?>' defer></script>
    <link rel='stylesheet' href='home.css?v=<?php echo time(); ?>'>
    <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <nav>
            <div id="foto">
            <img id="img" src="<?php echo imposta_img(); ?>">
            </div>
            <h1>Benvenuto <?php echo $_SESSION["Nome_Utente"]; ?>!</h1>
            
            <a href="home.php"><img class="home" src="icons/home.png"/></a>
            <a href="create_post.php"><img class="home" src="icons/post.png"/></a>
            <a href="search_people.php"><img class="home" src="icons/cerca.png"/></a>
            <a href="logout.php"><img class="home" src="icons/logout.png"/></a>
        </nav>

        <div id="modal_view" class="hidden">
        </div>

        <section>
        </section>
        <footer>
            <h5>Powered by Carlo Castorina 1000002023</h5> 
        </footer>
    </body>
</html>