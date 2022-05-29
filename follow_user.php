<?php
 

session_start();

if(!isset($_SESSION['Nome_Utente']))
{
    header("Location: login.php");
    exit;
}
 
$conn = mysqli_connect("localhost", "root", "", "web") or die("Errore: ".mysqli_connect_error());
$query="SELECT * FROM segue WHERE seguito = '".$_GET['id']."' AND seguace= '".$_SESSION['Nome_Utente']."'";
$res=mysqli_query($conn,$query);

if(mysqli_num_rows($res)==0)
{
    $query1 = "INSERT INTO segue value('".$_GET['id']."','".$_SESSION['Nome_Utente']."')";
    $res=mysqli_query($conn,$query1);
    echo "true";
}

else{
    $query2 = "DELETE FROM segue WHERE seguito= '".$_GET['id']."' AND seguace= '".$_SESSION['Nome_Utente']."' ";
    $res=mysqli_query($conn,$query2);
    echo"false";
} 
?>