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
    <title>Gestione PCTO - Visualizzazione attività di stage</title>
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
                    <li><a href="#">Attività di stage</a></li>
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
    <select name="cd_att" onchange="this.form.submit()"><br>

        <option value="" disabled selected>-- Seleziona --</option>

        <?php
        $query = "SELECT cod_attivita, titolo FROM attivita_di_stage";
        $ris = $conn->query($query);

        while ($riga = $ris->fetch_assoc()) {
            $selected = (isset($_POST['cd_att']) && $_POST['cd_att'] == $riga['cod_attivita']) ? 'selected' : '';
            echo '<option value="'.$riga['cod_attivita'].'" '.$selected.'>'.$riga['titolo'].'</option>';
        }
        ?>
    </select>
</form>

<?php
if(isset($_POST['cd_att']) && !empty($_POST['cd_att'])) {

    $cod_selezionato = $conn->real_escape_string($_POST['cd_att']);
    $query = "SELECT * FROM attivita_di_stage WHERE cod_attivita = '$cod_selezionato'";
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
