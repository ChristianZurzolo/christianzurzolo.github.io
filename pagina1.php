<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "ditta";

$conn = new mysqli($host, $user, $password, $database);
if($conn->connect_error){
    die("Errore di connessione: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;500;700&family=Space+Grotesk:wght@500;700&display=swap');

    :root {
        --bg-dark: #020617;
        --card-bg: rgba(30, 41, 59, 0.5);
        --accent: #0ea5e9;
        --accent-glow: rgba(14, 165, 233, 0.3);
        --text-main: #f8fafc;
        --text-muted: #94a3b8;
        --border: rgba(255, 255, 255, 0.1);
    }

    html, body {
        min-height: 100%;
        margin: 0;
        padding: 0;
        background-color: var(--bg-dark);
        scroll-behavior: smooth;
    }

    body {
        background-image: 
            radial-gradient(at 0% 0%, rgba(14, 165, 233, 0.15) 0px, transparent 50%),
            radial-gradient(at 100% 100%, rgba(30, 41, 59, 0.4) 0px, transparent 50%);
        color: var(--text-main);
        font-family: 'Plus Jakarta Sans', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 60px 20px;
        box-sizing: border-box;
    }

    h1 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(to right, #fff, var(--accent));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 40px;
        letter-spacing: -1px;
    }
    form {
        background: var(--card-bg);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        width: 100%;
        max-width: 650px;
        padding: 50px;
        border-radius: 24px;
        border: 1px solid var(--border);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        margin-bottom: 50px;
        transition: transform 0.3s ease;
    }

    form:hover {
        transform: translateY(-5px);
    }

    select {
        width: 100%;
        padding: 16px 20px;
        margin: 10px 0 30px 0;
        background: rgba(15, 23, 42, 0.8);
        border: 1px solid var(--border);
        color: var(--text-main);
        border-radius: 12px;
        font-size: 1rem;
        cursor: pointer;
        appearance: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    select:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 4px var(--accent-glow);
    }

    input[type="submit"] {
        width: 100%;
        padding: 18px;
        background: var(--accent);
        color: white;
        border: none;
        border-radius: 12px;
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 700;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px -5px rgba(14, 165, 233, 0.4);
    }

    input[type="submit"]:hover {
        background: #0284c7;
        box-shadow: 0 15px 25px -5px rgba(14, 165, 233, 0.5);
        transform: scale(1.02);
    }

    .nav-links {
        margin: 20px 0;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .nav-links a {
        text-decoration: none;
        color: var(--text-muted);
        font-size: 0.85rem;
        font-weight: 500;
        padding: 10px 18px;
        border-radius: 100px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--border);
        transition: all 0.2s ease;
    }

    .nav-links a:hover {
        background: var(--text-main);
        color: var(--bg-dark);
        border-color: var(--text-main);
    }

    table {
        width: 100%;
        max-width: 1100px;
        margin: 40px auto;
        border-collapse: collapse;
        background: var(--card-bg);
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid var(--border);
    }

    th {
        background-color: rgba(255, 255, 255, 0.05);
        color: var(--accent);
        font-family: 'Space Grotesk', sans-serif;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: 20px;
        letter-spacing: 1.5px;
        text-align: center;
        border-bottom: 2px solid var(--border);
    }

    td {
        padding: 18px 20px;
        border-bottom: 1px solid var(--border);
        color: var(--text-main);
        font-size: 0.9rem;
        text-align: center;
        opacity: 0.9;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover td {
        background-color: rgba(255, 255, 255, 0.03);
        opacity: 1;
    }

    h1:last-of-type {
        font-size: 1.5rem;
        margin-top: 20px;
        color: var(--text-muted);
        text-transform: capitalize;
    }

    .header-banner {
        width: 100%;
        max-width: 650px;
        height: auto;
        border-radius: 20px;
        border: 1px solid var(--border);
        box-shadow: 0 0 30px rgba(14, 165, 233, 0.15);
        margin-bottom: 30px;
        display: block;
    }

    footer {
        width: 100%;
        max-width: 650px;
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid var(--border);
        color: var(--text-muted);
        font-family: 'Space Grotesk', sans-serif;
        font-size: 0.85rem;
        text-align: center;
        letter-spacing: 0.5px;
        opacity: 0.8;
    }

    p { color: var(--text-muted); font-style: italic; }
</style>
</head>
<body>

<h1>Elenco dipendenti</h1>

<form method="post">
    <select name="studente_cf" onchange="this.form.submit()"><br>
    <div class="nav-links">
    <a href="gestione_pcto.php">Home</a>
    <a href="pagina2.php">Visualizza tutor scolastici</a>
    <a href="pagina3.php">Visualizza tutor aziendali</a>
    <a href="pagina4.php">Inserisci nuovo studente</a>
    <a href="pagina5.php">Inserisci nuovo tutor scolastico</a>
    <a href="pagina6.php">Inserisci nuovo tutor aziendale</a>
    <a href="pagina7.php">Elimina studente esistente</a>
    <a href="pagina8.php">Elimina tutor scolastico esistente</a>
    <a href="pagina9.php">Elimina tutor aziendale esistente</a>
</div>

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
