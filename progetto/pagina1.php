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
    <title>Gestione PCTO - Visualizzazione studenti</title>
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
                    <li><a href="#">Studenti</a></li>
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

<h1>Elenco studenti</h1>

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
    $query = "SELECT * FROM studente WHERE cf_studente = '$cf_selezionato'";
    $ris = $conn->query($query);

    if ($ris && $ris->num_rows > 0) {

        echo "<table>";
        echo "<tr>";
        while ($field = $ris->fetch_field()) {
            echo "<th>" . str_replace('_', ' ', $field->name) . "</th>";
        }

        echo "</tr>";
        while ($riga = $ris->fetch_assoc()) {
            echo "<tr>";
            foreach ($riga as $valore) {
                echo "<td>" . $valore . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";

    } else {
        echo "<p>Nessun dato trovato per lo studente selezionato.</p>";
    }
}
?>

</body>
</html>
