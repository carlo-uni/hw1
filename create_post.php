<?php
    session_start();
    if(!isset($_SESSION["Nome_Utente"]))
    {
        $_SESSION["contenuto"] = $_POST["contenuto"];
        $_SESSION["descrizione"] = $_POST["descrizione"];
        header("Location: login.php");
        exit;
    }

 
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='create_post.css?v=<?php echo time(); ?>'>
        <script src='create_post.js?v=<?php echo time(); ?>' defer></script>
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crea post</title>
    </head>
    
    <body>

        <nav>
            <h1> Crea il tuo post!</h1>
            <a href="home.php"><img class="home" src="icons/home.png"/></a>
            <a href="create_post.php"><img class="home" src="icons/post.png"/></a>
            <a href="search_people.php"><img class="home" src="icons/cerca.png"/></a>
            <a href="logout.php"><img id="home" src="icons/logout.png"/></a>
        </nav>

        <main>

            <div class="form">
                <form name='form' method='post' id='form'>
                    <p> 
                        <label>Ricerca contenuto: <input type='text' name="contenuto"></label>
                    </p>
                    <p>
                        <label>Seleziona servizio: 
                            <select name='servizi'>
                                <option value='NASA'>Immagini NASA</option>
                                
                            </select>
                        </label>
                    </p>
                    <p>
                        <label>&nbsp;<input type='submit'></label>
                    </p>
                </form>
            </div>

            <div id='struttura_ricerca'>
                <h1> Come cercare i contenuti:</h1>
                <strong> Immagini NASA:</strong> La scelta di questo servizio permette l'accesso ad uno dei siti Web più popolari della NASA... l' Astronomia Picture of the Day. Inserisci le date nel formato AAAA-MM-GG e condividi immagini spaziali.</br></br>
                
            </div>
        </main>

        <section id="visualizza_risultati">           
        </section>

        <section id="modal_view" class="hidden">
            <div id="form">
                <form name='post' method='post'>
                    <h3> Clicca sulla foto per tornare alla scelta del contenuto</h3>
                    <textarea name='descrizione' placeholder="Inserisci qui la descrizione del post..."></textarea>
                    <input type='submit'>
                </form>
            </div>
          
        </section>
    </body>
</html>
