<?php
    session_start();
    if(!isset($_SESSION['Nome_Utente']))
    {

        header("Location: login.php");
        exit;
    }

    $conn = mysqli_connect("localhost", "root", "", "web");
    $query="SELECT * FROM mipiace WHERE id_utente='".$_SESSION['Nome_Utente']."' AND id_post='".$_GET['id_post']."'";
    $res=mysqli_query($conn,$query);
    if (mysqli_num_rows($res)==0)
    {
        $query1 = "INSERT INTO mipiace VALUES('".$_SESSION['Nome_Utente']."','".$_GET['id_post']."')";
        $res = mysqli_query($conn, $query1);
    
        $query2="UPDATE `post` SET `numero_like` = numero_like+1 where id_post='".$_GET['id_post']."'";
        $res=mysqli_query($conn, $query2);
    }
    else{
        $query1 = "DELETE FROM mipiace WHERE id_utente='".$_SESSION['Nome_Utente']."' AND id_post='".$_GET['id_post']."'";
        mysqli_query($conn, $query1);
    
        $query2="UPDATE `post` SET `numero_like` = numero_like-1 where id_post='".$_GET['id_post']."'";
        mysqli_query($conn, $query2);
    }

    $query="SELECT * FROM post where id_utente='".$_SESSION['Nome_Utente']."' or id_utente in (select seguito from segue where seguace='".$_SESSION['Nome_Utente']."') ORDER BY data_pubblicazione desc";
    $res = mysqli_query($conn, $query);
    while($row=mysqli_fetch_assoc($res))
    {
        $users[]=$row;
    }
    mysqli_free_result($res);
    mysqli_close($conn);
    echo json_encode($users);
?>