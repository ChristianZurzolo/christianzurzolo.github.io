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
    <title>Gestione PCTO - Eliminazione studenti</title>
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
                    <li><a href="pagina4.php">Nuovo Studente</a></li>
                    <li><a href="pagina5.php">Nuovo Tutor Scolastico</a></li>
                    <li><a href="pagina6.php">Nuovo Tutor Aziendale</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <button class="nav-button">Elimina</button>
                <ul class="dropdown-menu">
                    <li><a href="#">Elimina Studente</a></li>
                    <li><a href="pagina8.php">Elimina Tutor Scolastico</a></li>
                    <li><a href="pagina9.php">Elimina Tutor Aziendale</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<h1>Eliminazione studenti</h1>

<form method="post">
    <select name="studente_cf" onchange="this.form.submit()"><br>

        <option value="" disabled selected>-- Seleziona --</option>

        <?php
        $query = "SELECT cf_studente, nome_studente, cognome_studente FROM studente";
        $ris = $conn->query($query);

        while ($riga = $ris->fetch_assoc()) {
            $selected = (isset($_POST['studente_cf']) && $_POST['studente_cf'] == $riga['cf_studente']) ? 'selected' : '';
            echo '<option value="'.$riga['cf_studente'].'" '.$selected.'>'.$riga['nome_studente'].' '.$riga['cognome_studente'].'</option>';
        }
        ?>
    </select>
</form>

<?php
if(isset($_POST['studente_cf']) && !empty($_POST['studente_cf'])) {

    $cf_selezionato = $conn->real_escape_string($_POST['studente_cf']);
    $query = "DELETE FROM studente WHERE cf_studente = '$cf_selezionato'";
    $ris = $conn->query($query);
}
?>

</body>
</html>