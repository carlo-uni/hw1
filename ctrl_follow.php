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
    echo "true";
}

else{
    echo"false";
} 
?>