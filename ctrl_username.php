<?php

        if(isset($_GET["id"]))
        {
            $conn = mysqli_connect("localhost", "root", "", "web");
            $query = "SELECT * FROM utente WHERE id='".$_GET["id"]."'";
            $res = mysqli_query($conn, $query);
            if(mysqli_num_rows($res)>0)
            {
                
                echo "true";
                
            }
        }
?>