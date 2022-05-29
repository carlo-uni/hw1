<?php

    
    session_start();
    
    if(isset($_SESSION["Nome_Utente"]))
    {
        header("Location: home.php");
        exit;
    }

    function controllo_img(){
        $target_dir = "images/";
        $target_file = basename($_FILES["fileToUpload"]["name"]);
        // original $target_file
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            }
            else {
                echo "Il file non è una foto";
                $uploadOk = 0;
            }
                
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "Inserisci solo file di tipo JPG, JPEG, PNG.";
                    $uploadOk = 0;
                }         
      
        if ($uploadOk == 0) {
            echo "Il File non è stato salvato";
    
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                return true;
            } else 
            {
                echo "Errore durante l'upload della foto";
            }
        }
    } 


    if(isset($_POST["Nome_Utente"]) && isset($_POST["Password"])&& (controllo_img()==true))
    {
    
        $conn = mysqli_connect("localhost", "root", "", "web");
        $query = "INSERT INTO utente values('".$_POST["Nome_Utente"]."','".$_POST["Nome"]."','".$_POST["Cognome"]."','".$_POST["Email"]."','".$_POST["Password"]."','".$_FILES["fileToUpload"]["name"]."','".$_POST["genere"]."','".$_POST["n_telefono"]."','".$_POST["Data_Nascita"]."','".$_POST["Paese"]."')";
        $res = mysqli_query($conn, $query);
    
        if($res > 0)
        {
            $_SESSION["Nome_Utente"]=$_POST["Nome_Utente"];
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
        <link rel='stylesheet' href='signup.css?v=<?php echo time(); ?>'>
        <script src='controllo_signup.js?v=<?php echo time(); ?>' defer></script>
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TRMN</title>
    </head>
    <body>
        <?php
            
            if(isset($errore))
            {                                       
                echo "<p class='errore'>";
                echo "L'utente è già registrato";
                echo "</p>";
            }
        ?>
        <h1>TRMN è quello che fà per te!</h1>
        <p id="subtitle"> TRMN è uno social interamente dedicato a te, ai tuoi contenuti e a quelli degli utenti che segui.</br> Iscriviti compilando il seguente form ed entra a far parte del mondo TRMN! </p>

        <main>
            <div class='form'>
            <form name='form_signup' method='post' enctype="multipart/form-data">
                <p>
                    <label>Nome: <input type='text' name='Nome'></label>
                </p>
                <p>
                    <label>Cognome: <input type='text' name='Cognome'></label>
                </p>
                <p>
                    <label>E-mail: <input type='text' name='Email'></label> 
                </p>
                <p>
                    <label>Nome utente: <input id="Nome_Utente" type='text' name='Nome_Utente'></label>
                </p>
                <p>
                    <label>Password: <input type='password' name='Password' placeholder='Max 16 caratteri'></label>
                </p>
                <p>
                    <label>Conferma Password: <input type='password' name='Conferma_Password'></label>
                </p>
                <p>
                    <label>Data di nascita: <input type='date' name='Data_Nascita'></label>
                </p>
                <p>
                    Sesso: 
                    <span>
                          <input type='radio' name='genere' value='M'>M
                          <input type='radio' name='genere' value='F'>F
                    </span>
                </p>
                <p>
                    <label>Paese: <input type='text' name='Paese'></label>
                </p>
                <p>
                    <label>Numero di telefono: <input type='text' name='n_telefono' placeholder='Es. 0123456789'></label>
                </p>
                <p>
                    <label>Seleziona l'avatar: <input type='file' name="fileToUpload" id="fileToUpload"></label>
                </p>
                <p>
                    <label>&nbsp;<input type='submit'></label>
                </p>
            </form>
        </div>
        </main>

        <section>
            <p>Hai già un account? <a href="login.php">Effettua il login!</a></p>
        </section>

        <footer>
            <h5>Powered by Carlo Castorina 1000002023</h5> 
        </footer>
    </body>
    
</html>