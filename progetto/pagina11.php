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
    <title>Gestione PCTO - Inserimento attività di stage</title>
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
                    <li><a href="pagina6.php">Nuovo Tutor Aziendale</a></li>
                    <li><a href="#">Nuova attività di stage</a></li>
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
    Ambito insegnamento
    <input type="text" name="ambito" placeholder="Inserisci cognome...">
    Codice attività
    <input type="text" name="cd_att" placeholder="Inserisci codice fiscale...">
    Data inizio
    <input type="date" name="data_inizio" id="">
    Data fine
    <input type="date" name="data_fine" id="">
    Numero massimo studenti
    <input type="number" name="num_max_studenti" id="">
    Competenze richieste
    <input type="text" name="competenze" id="">
    Attività tirocinanti
    <input type="text" name="tirocinio" id="">
    <input type="submit" value="Invia">
</form>

<?php
if(
    isset($_POST['cd_att']) && isset($_POST['num_max_studenti']) && 
    isset($_POST['nome']) && isset($_POST['data_inizio']) && 
    isset($_POST['ambito']) && isset($_POST['data_fine']) && 
    isset($_POST['competenze']) && isset($_POST['tirocinio'])
){
    $cod_attivita = $_POST['cd_att'];
    $num_max_studenti = $_POST['num_max_studenti'];
    $titolo = $_POST['nome'];
    $data_inizio = $_POST['data_inizio'];
    $ambito_insegnamento = $_POST['ambito'];
    $data_fine = $_POST['data_fine'];
    $competenze_richieste = $_POST['competenze'];
    $attivita_tirocinanti = $_POST['tirocinio'];
    $query = "INSERT INTO attivita_di_stage (cod_attivita, num_max_studenti, titolo, data_inizio, ambito_insegnamento, data_fine, competenze_richieste, attivita_tirocinanti) 
              VALUES ('$cod_attivita', '$num_max_studenti', '$titolo', '$data_inizio', '$ambito_insegnamento', '$data_fine', '$competenze_richieste', '$attivita_tirocinanti');";
    $ris = $conn->query($query);
    if($ris){
        echo "<p style='color:green; font-weight:bold;'>Attività di stage inserita con successo!</p>";
    } else {
        echo "<p style='color:red; font-weight:bold;'>Errore durante l'inserimento: " . $conn->error . "</p>";
    }
}
?>

</body>
</html>
