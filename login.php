<?php
session_start();

// Se l'utente ha già una sessione attiva, lo manda direttamente alla dashboard
if(isset($_SESSION['loggato']) && $_SESSION['loggato'] === true){
    header("Location: gestione_pcto.php");
    exit;
}

$errore = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Credenziali di prova (modificabili)
    if($username === "admin" && $password === "password123"){
        $_SESSION['loggato'] = true;
        $_SESSION['username'] = $username;
        
        header("Location: gestione_pcto.php");
        exit;
    } else {
        $errore = "Username o Password errati!";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PCTO Portal</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .login-container { max-width: 400px; margin: 100px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; font-family: sans-serif; }
        .error-msg { color: red; font-weight: bold; margin-bottom: 15px; }
        .login-container input[type="text"], .login-container input[type="password"] { width: 100%; padding: 8px; margin: 8px 0 15px 0; box-sizing: border-box; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Accesso Portale PCTO</h2>
    
    <?php if(!empty($errore)): ?>
        <p class="error-msg"><?php echo $errore; ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <label>Username</label>
        <input type="text" name="username" required placeholder="Inserisci username...">
        
        <label>Password</label>
        <input type="password" name="password" required placeholder="Inserisci password...">
        
        <input type="submit" value="Accedi">
    </form>
</div>

</body>
</html>