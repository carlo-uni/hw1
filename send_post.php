<?php
    session_start();
    if(!(isset($_SESSION['Nome_Utente'])))
    {
        header("Location: login.php");
        exit;
    }
    
    
    $conn = mysqli_connect("localhost", "root", "", "web");
    
    echo $_GET["contenuto"];
    $query = "INSERT INTO post VALUES ('',now(),'".$_GET["descrizione"]."','".$_GET["contenuto"]."','".$_SESSION["Nome_Utente"]."','')";
    echo "<p>";
    echo "true";
    echo "</p>"; 
    $res = mysqli_query($conn, $query);
?>

<html>
    <body>
    <?php
    ?>
    </body>
</html>