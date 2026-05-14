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
<html>
<head>
    <meta charset="UTF-8">
    <title>Selezionare la tabella da visualizzare: </title>
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

    p { color: var(--text-muted); font-style: italic; }
</style>
</head>
<body>
    <h1>Seleziona la tabella da visualizzare: </h1><br>

    <form action="" method="post">
        <select name="tabelle">
            <option value="" disabled selected>Seleziona un'opzione</option>
            <option value="attivita_di_stage">Tabella Attività di stage</option>
            <option value="azienda">Tabella Azienda</option>
            <option value="propone">Tabella Propone</option>
            <option value="si_candida">Tabella Si candida</option>
            <option value="studente">Tabella Studente</option>
            <option value="tutor_aziendale">Tabella Tutor aziendale</option>
            <option value="tutor_scolastico">Tabella Tutor scolastico</option>
        </select>
        <br><br>
        <input type="submit" value="Visualizza">
        <br><br>
<div class="nav-links">
    <a href="pagina1.php">Visualizza Studenti</a>
    <a href="pagina2.php">Visualizza Tutor scolastici</a>
    <a href="pagina3.php">Visualizza Tutor aziendali</a>
    <a href="pagina4.php">Inserisci Nuovo Studente</a>
    <a href="pagina5.php">Inserisci Nuovo Tutor scolastico</a>
    <a href="pagina6.php">Inserisci Nuovo Tutor aziendale</a>
    <a href="pagina7.php">Elimina Dipendente Esistente</a>
    <a href="pagina8.php">Elimina Tutor scolastico Esistente</a>
    <a href="pagina9.php">Elimina Tutor aziendale Esistente</a>
</div>
        <br><br>
        <center><h1><?= $selected_table ?></h1></center>
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
        echo "<p>Tabella vuota.</p>";
    }
}

$conn->close();
?>
</body>
</html>
