<?php

    
    session_start();
    
    if(!isset($_SESSION['Nome_Utente']))
    {
        
        header("Location: login.php");
        exit;
    }

    $conn = mysqli_connect("localhost", "root", "", "web");
    $query="SELECT id, avatar FROM utente WHERE id IN(SELECT id_utente FROM mipiace WHERE id_post='".$_GET['id_post']."')";
    $res=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($res))
    {
        $users[]=$row;
    }
    mysqli_free_result($res);
    mysqli_close($conn);
    echo json_encode($users);

?>