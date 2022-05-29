<?php
    session_start();
    if(!isset($_SESSION["Nome_Utente"]))
    {
        // Vai alla home
        header("Location: login.php");
        exit;
    }
?>

<html>
    <head>
        <link rel='stylesheet' href='search_peoples.css?v=<?php echo time(); ?>'>
        <script src='search_people.js?v=<?php echo time(); ?>' defer></script>
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cerca utenti</title>
    </head>
    
    <body>

        <nav>
            <h1> Cerca utenti</h1>
            <a href="home.php"><img id="home" src="icons/home.png"/></a>
            <a href="create_post.php"><img id="home" src="icons/post.png"/></a>
            <a href="search_people.php"><img id="home" src="icons/cerca.png"/></a>
            <a href="logout.php"><img id="home" src="icons/logout.png"/></a>
        </nav>

        <main>

                <form name='form' method='get' id='form_ricerca'>
                    <p> 
                        <label>Cerca utente: <input type='text' name='utente_cercato'></label>
                    </p>
                    <p>
                        <label>&nbsp;<input type='submit' value="cerca"></label>
                    </p>
                </form>
                <h1 class="title">Clicca sul tasto "cerca" per trovare tutti gli utenti registrati, altrimenti specificane uno!</h1>
                
            <section>
                
            </section>
        </main>
    </body>
</html>
