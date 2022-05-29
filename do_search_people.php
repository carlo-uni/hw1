<?php
 

session_start();

if(!isset($_SESSION['Nome_Utente']))
{
   
    header("Location: login.php");
    exit;
}
 
$conn = mysqli_connect("localhost", "root", "", "web") or die("Errore: ".mysqli_connect_error());
 
if($_GET['utente_cercato']!=null)
$query = "SELECT * from utente where id = '".$_GET['utente_cercato']."' AND id != '".$_SESSION['Nome_Utente']."'";
else
$query = "SELECT * FROM utente WHERE id != '".$_SESSION['Nome_Utente']."'";
$res = mysqli_query($conn, $query);
while($row=mysqli_fetch_assoc($res))
{
    $users[]=$row;
}
// 

// 
mysqli_free_result($res);
mysqli_close($conn);
echo json_encode($users);

?>