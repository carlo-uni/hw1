
<?php
session_start();
if (!isset($_SESSION['Nome_Utente'])) {
    
    header("Location: login.php");
    exit;
}
$users  = array();
$conn = mysqli_connect("localhost", "root", "", "web");
$query = "SELECT p.id_post,p.data_pubblicazione,p.descrizione,p.contenuto_multimediale,p.id_utente,p.numero_like,coalesce(m.id_utente,0)
as liked from post p left join 
(select * from mipiace where id_utente = '" . $_SESSION['Nome_Utente'] . "')
as m on p.id_post = m.id_post where p.id_utente = '" . $_SESSION['Nome_Utente'] . 
"' or p.id_utente in (select seguito from segue where seguace = '" . $_SESSION['Nome_Utente'] . "') 
order by p.data_pubblicazione desc";

$res = mysqli_query($conn, $query);
for ($i = 0; $i < mysqli_num_rows($res); $i++) {
    $row = mysqli_fetch_assoc($res);
    $users[] = $row;
}

mysqli_free_result($res);


mysqli_close($conn);
json_encode($users);
echo json_encode($users);


?>