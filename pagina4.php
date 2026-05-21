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
    <title>Gestione PCTO - Inserimento studenti</title>
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
                </ul>
            </li>
            <li class="nav-item">
                <button class="nav-button">Inserisci</button>
                <ul class="dropdown-menu">
                    <li><a href="#">Nuovo Studente</a></li>
                    <li><a href="pagina5.php">Nuovo Tutor Scolastico</a></li>
                    <li><a href="pagina6.php">Nuovo Tutor Aziendale</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <button class="nav-button">Elimina</button>
                <ul class="dropdown-menu">
                    <li><a href="pagina7.php">Elimina Studente</a></li>
                    <li><a href="pagina8.php">Elimina Tutor Scolastico</a></li>
                    <li><a href="pagina9.php">Elimina Tutor Aziendale</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<h1>Inserimento studenti</h1>

<form action="" method="post">
    Nome
    <input type="text" name="nome" placeholder="Inserisci nome...">
    Cognome
    <input type="text" name="cognome" placeholder="Inserisci cognome...">
    Data di nascita
    <input type="date" name="data" placeholder="Inserisci data di nascita...">
    Codice fiscale
    <input type="text" name="cf" placeholder="Inserisci codice fiscale...">
    Telefono
    <input type="tel" name="telefono" placeholder="Inserisci numero di telefono...">
    Competenze
    <input type="text" name="competenze" placeholder="Inserisci competenze...">
    Mail 
    <input type="email" name="email" placeholder="Inserisci email...">
    Classe
    <select name="classe" id="">
        <option value="" disabled selected>Seleziona una classe...</option>
        <option value="1">Prima</option>
        <option value="2">Seconda</option>
        <option value="3">Terza</option>
        <option value="4">Quarta</option>
        <option value="5">Quinta</option>
    </select>
    Indirizzo studi 
    <select name="indirizzo" id="">
        <option value="" disabled selected>Seleziona un indirizzo di studi...</option>
        <option value="informatica">Informatica</option>
        <option value="chimica">Chimica</option>
        <option value="grafica">Grafica</option>
        <option value="ambientale">Ambientale</option>
    </select>
    Tutor scolastico
    <select name="cft" id="">
        <option value="" disabled selected>Seleziona un opzione...</option>
        <option value="aa">Fabio Zanzibar</option>
        <option value="ab">Silvia Pezzi</option>
        <option value="ac">Gianfrancesco Consorzio</option>
        <option value="ad">Luciano Ollera</option>
        <option value="ae">Sergio Marco</option>
    </select>
    <input type="submit" value="Invia">
</form>

<?php
if(isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['data']) && isset($_POST['cf']) && isset($_POST['telefono']) && isset($_POST['competenze']) && isset($_POST['email']) && isset($_POST['classe']) && isset($_POST['indirizzo']) && isset($_POST['cft'])){
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $data = $_POST['data'];
    $cf = $_POST['cf'];
    $telefono = $_POST['telefono'];
    $competenze = $_POST['competenze'];
    $email = $_POST['email'];
    $classe = $_POST['classe'];
    $indirizzo = $_POST['indirizzo'];
    $cft = $_POST['cft'];
    $query = "INSERT INTO studente (nome_studente, cognome_studente, data_nascita, cf_studente, telefono_studente, competenze_studente, mail_studente, classe, indirizzo_studi, cf_tutor_scolastico) VALUES ('$nome', '$cognome', '$data', '$cf', '$telefono', '$competenze', '$email', '$classe', '$indirizzo', '$cft');";
    $ris = $conn->query($query);
}
?>

</body>
</html>