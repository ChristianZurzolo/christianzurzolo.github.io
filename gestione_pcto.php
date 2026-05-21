<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "gestione_pcto";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    echo "Errore di connessione: " . $conn->connect_error;
    exit();
}

$selected_table = isset($_POST['tabelle']) ? $_POST['tabelle'] : '';
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione PCTO - Dashboard</title>
    <link rel="icon" type="image/x-icon" href="favicon_gpoi_informatica.ico">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="navbar-container">
        <a href="#" class="nav-brand">PCTO Portal</a>
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
                    <li><a href="pagina7.php">Elimina Studente</a></li>
                    <li><a href="pagina8.php">Elimina Tutor Scolastico</a></li>
                    <li><a href="pagina9.php">Elimina Tutor Aziendale</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<img src="PROGETTO_INFORMATICA_GPOI.jpg" alt="Progetto multidisciplinare Informatica-GPOI" class="header-banner">
    
    <h1>Database Explorer</h1>

    <form action="" method="post">
        <label style="color: var(--text-muted); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Seleziona Tabella</label>
        <select name="tabelle">
            <option value="" disabled selected>Scegli una tabella dal database...</option>
            <option value="attivita_di_stage">Tabella Attività di stage</option>
            <option value="azienda">Tabella Azienda</option>
            <option value="propone">Tabella Propone</option>
            <option value="si_candida">Tabella Si candida</option>
            <option value="studente">Tabella Studente</option>
            <option value="tutor_aziendale">Tabella Tutor aziendale</option>
            <option value="tutor_scolastico">Tabella Tutor scolastico</option>
        </select>
        <input type="submit" value="Visualizza">
        
        <?php if ($selected_table): ?>
            <div style="text-align: center; margin-top: 25px;">
                <div class="table-title"><?= str_replace('_', ' ', $selected_table) ?></div>
            </div>
        <?php endif; ?>
    </form>
    

<?php
if ($selected_table) {
    $ris = $conn->query("SELECT * FROM $selected_table");

    if ($ris->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        while ($field = $ris->fetch_field()) {
            echo "<th>" . $field->name . "</th>";
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
        echo "<p style='text-align:center;'>Tabella vuota o nessun record trovato.</p>";
    }
}

$conn->close();
?>
<footer>Grassi Thomas, Christian Mazzei, Christian Zurzolo | 5B Inf 2025/2026</footer>
</body>
</html>