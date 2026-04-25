<?php
$zamoljeni_broj = rand(1, 9);
$poruka = "";
$klasa = "";

if ($_POST) {
    if ($_POST['broj'] == $zamoljeni_broj) {
        $poruka = "Pogodak, probaj ponovo!";
        $klasa = "success";
    } else {
        $poruka = "Krivo, probaj ponovo!";
        $klasa = "danger";
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Igra - Pogodi broj</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        input {
            width: 100px;
            padding: 5px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .success {
            background-color: #27ae60;
            color: white;
        }

        .danger {
            background-color: #e74c3c;
            color: white;
        }

        .success:hover {
            background-color: #229954;
        }

        .danger:hover {
            background-color: #cb4335;
        }

        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Igra (pogodi broj)</h1>
    
    <form method="POST" action="">
        <label>Upiši jedan broj od 1 do 9*</label><br>
        <input type="number" name="broj" min="1" max="9" required><br>
        <button type="submit" class="<?php echo $klasa; ?>">
            <?php echo $poruka ? $poruka : 'Pogodi!'; ?>
        </button>
    </form>

    <?php if ($poruka): ?>
    <div class="result">
        <?php echo $poruka; ?><br>
        Zamišljeni broj je <?php echo $zamoljeni_broj; ?>
    </div>
    <?php endif; ?>
</body>
</html>
