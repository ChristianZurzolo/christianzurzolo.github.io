<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "gestione_pcto";

$conn = new mysqli($host, $user, $password, $database);
if($conn->connect_error){
    die("Errore di connessione: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione PCTO - Inserimento tutor aziendali</title>
    <link rel="icon" type="image/x-icon" href="favicon_gpoi_informatica.ico">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="navbar-container">
        <a href="gestione_pcto.php" class="nav-brand">PCTO Portal</a>
        <ul class="nav-menu">
            <li class="nav-item">
                <button class="nav-button">Visualizza Dati</button>
                <ul class="dropdown-menu">
                    <li><a href="pagina1.php">Studenti</a></li>
                    <li><a href="pagina2.php">Tutor Scolastici</a></li>
                    <li><a href="pagina3.php">Tutor Aziendali</a></li>
                    <li><a href="pagina10.php">Attività di stage</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <button class="nav-button">Inserisci</button>
                <ul class="dropdown-menu">
                    <li><a href="pagina4.php">Nuovo Studente</a></li>
                    <li><a href="pagina5.php">Nuovo Tutor Scolastico</a></li>
                    <li><a href="#">Nuovo Tutor Aziendale</a></li>
                    <li><a href="pagina11.php">Nuova attività di stage</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <button class="nav-button">Elimina</button>
                <ul class="dropdown-menu">
                    <li><a href="pagina7.php">Elimina Studente</a></li>
                    <li><a href="pagina8.php">Elimina Tutor Scolastico</a></li>
                    <li><a href="pagina9.php">Elimina Tutor Aziendale</a></li>
                    <li><a href="pagina12.php">Elimina attività di stage</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<h1>Inserimento tutor scolastici</h1>

<form action="" method="post">
    Nome
    <input type="text" name="nome" placeholder="Inserisci nome...">
    Cognome
    <input type="text" name="cognome" placeholder="Inserisci cognome...">
    Codice fiscale
    <input type="text" name="cf" placeholder="Inserisci codice fiscale...">
    Telefono
    <input type="tel" name="telefono" placeholder="Inserisci numero di telefono...">
    Mail
    <input type="email" name="email" placeholder="Inserisci email...">
    Competenze
    <input type="text" name="competenze" placeholder="Inserisci competenze...">
    Inquadramento
    <input type="text" name="inquadramento" placeholder="Inserisci inquadramento...">
    Esperienze
    <input type="text" name="esperienze" placeholder="Inserisci esperienze...">
    
    Attività di Stage
    <select name="attivita" id="">
        <option value="" disabled selected>Seleziona un'attività...</option>
        <option value="1">Lavorazione metallo</option>
        <option value="2">Scarichi wc</option>
        <option value="3">Crimpaggio cavo ethernet</option>
        <option value="4">Scioglimento solfato rameico</option>
        <option value="5">Progettazione divani</option>
    </select>
    <input type="submit" value="Invia">
</form>

<?php
if(
    isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['cf']) && 
    isset($_POST['telefono']) && isset($_POST['competenze']) && isset($_POST['email']) && 
    isset($_POST['inquadramento']) && isset($_POST['esperienze']) && isset($_POST['attivita'])
){
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $cf = $_POST['cf'];
    $telefono = $_POST['telefono'];
    $competenze = $_POST['competenze'];
    $inquadramento = $_POST['inquadramento'];
    $esperienze = $_POST['esperienze'];
    $cod_attivita = $_POST['attivita']; 
    $query = "INSERT INTO tutor_aziendale (nome_tutor_aziendale, cognome_tutor_aziendale, cf_tutor_aziendale, telefono_tutor_aziendale, email_tutor_aziendale, competenze_tutor_aziendale, inquadramento, esperienze, cod_attivita) 
              VALUES ('$nome', '$cognome', '$cf', '$telefono', '$email', '$competenze', '$inquadramento', '$esperienze', '$cod_attivita');";
    $ris = $conn->query($query);
    if($ris){
        echo "<p style='color:green; font-weight:bold;'>Inserimento avvenuto con successo!</p>";
    } else {
        echo "<p style='color:red; font-weight:bold;'>Errore durante l'inserimento: " . $conn->error . "</p>";
    }
}
?>
</body>
</html>
