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
    <title>Gestione PCTO - Inserimento tutor scolastici</title>
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
                    <li><a href="#">Nuovo Tutor Scolastico</a></li>
                    <li><a href="pagina6.php">Nuovo Tutor Aziendale</a></li>
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
    Materia
    <input type="text" name="materia" placeholder="Inserisci materia...">
    <input type="submit" value="Invia">
</form>

<?php
if(isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['cf']) && isset($_POST['telefono']) && isset($_POST['materia']) && isset($_POST['email'])){
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $cf = $_POST['cf'];
    $telefono = $_POST['telefono'];
    $materia = $_POST['materia'];
    $query = "INSERT INTO tutor_scolastico (nome_tutor_scolastico, cognome_tutor_scolastico, cf_tutor_scolastico, telefono_tutor_scolastico, email_tutor_scolastico, materia) VALUES ('$nome', '$cognome', '$cf', '$telefono', '$email', '$materia');";
    $ris = $conn->query($query);
}
?>

</body>
</html>
