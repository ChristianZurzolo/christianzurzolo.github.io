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
    <title>Gestione PCTO - Eliminazione tutor aziendali</title>
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
                    <li><a href="pagina11.php">Nuova attività di stage</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <button class="nav-button">Elimina</button>
                <ul class="dropdown-menu">
                    <li><a href="pagina7.php">Elimina Studente</a></li>
                    <li><a href="pagina8.php">Elimina Tutor Scolastico</a></li>
                    <li><a href="#">Elimina Tutor Aziendale</a></li>
                    <li><a href="pagina12.php">Elimina attività di stage</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<h1>Eliminazione tutor aziendali</h1>

<form method="post">
    <select name="tutor_cf" onchange="this.form.submit()"><br>

        <option value="" disabled selected>-- Seleziona --</option>

        <?php
        $query = "SELECT cf_tutor_aziendale, nome_tutor_aziendale, cognome_tutor_aziendale FROM tutor_aziendale";
        $ris = $conn->query($query);

        while ($riga = $ris->fetch_assoc()) {
            $selected = (isset($_POST['tutor_cf']) && $_POST['tutor_cf'] == $riga['cf_tutor_aziendale']) ? 'selected' : '';
            echo '<option value="'.$riga['cf_tutor_aziendale'].'" '.$selected.'>'.$riga['nome_tutor_aziendale'].' '.$riga['cognome_tutor_aziendale'].'</option>';
        }
        ?>
    </select>
</form>

<?php
if(isset($_POST['tutor_cf']) && !empty($_POST['tutor_cf'])) {

    $cf_selezionato = $conn->real_escape_string($_POST['tutor_cf']);
    $query = "DELETE FROM tutor_aziendale WHERE cf_tutor_aziendale = '$cf_selezionato'";
    $ris = $conn->query($query);
}
?>

</body>
</html>